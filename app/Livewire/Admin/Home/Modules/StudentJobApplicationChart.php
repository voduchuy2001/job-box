<?php

namespace App\Livewire\Admin\Home\Modules;

use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Livewire\Component;

class StudentJobApplicationChart extends Component
{
    public string $course = 'K49';

    public function getStudentsByCourseWithApprovedAndRejectedApplications(): array
    {
        $acceptedStudents = DB::table('profiles')
            ->join('applications', 'profiles.id', '=', 'applications.student_id')
            ->select(DB::raw('payload->"$.course" as course'), DB::raw('COUNT(DISTINCT profiles.id) as total_students'))
            ->where('type', 'Student')
            ->where('applications.status', 'accepted')
            ->groupBy('course')
            ->orderBy('course')
            ->get();

        $rejectedStudents = DB::table('profiles')
            ->join('applications', 'profiles.id', '=', 'applications.student_id')
            ->select(DB::raw('payload->"$.course" as course'), DB::raw('COUNT(DISTINCT profiles.id) as total_students'))
            ->where('type', 'Student')
            ->where('applications.status', 'rejected')
            ->groupBy('course')
            ->orderBy('course')
            ->get();

        return [
            'accepted_students' => $acceptedStudents,
            'rejected_students' => $rejectedStudents,
        ];
    }

    public function render(): View
    {
        $studentJobApplications = $this->getStudentsByCourseWithApprovedAndRejectedApplications();

        $acceptedStudentJobCounts = $studentJobApplications['accepted_students']
            ->pluck('total_students')
            ->toArray();
        $acceptedStudentJobLabels = $studentJobApplications['accepted_students']
            ->pluck('course')
            ->map(function ($label) {
                return str_replace('"', '', $label);
            })
            ->toArray();

        $rejectedStudentJobCounts = $studentJobApplications['rejected_students']
            ->pluck('total_students')
            ->toArray();
        $rejectedStudentJobLabels = $studentJobApplications['rejected_students']
            ->pluck('course')
            ->map(function ($label) {
                return str_replace('"', '', $label);
            })
            ->toArray();

        return view('livewire.admin.home.modules.student-job-application-chart', [
            'acceptedStudentJobCounts' => $acceptedStudentJobCounts,
            'acceptedStudentJobLabels' => $acceptedStudentJobLabels,
            'rejectedStudentJobCounts' => $rejectedStudentJobCounts,
            'rejectedStudentJobLabels' => $rejectedStudentJobLabels,
        ]);
    }
}
