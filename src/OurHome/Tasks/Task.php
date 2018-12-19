<?php
namespace OurHome\Tasks;

use OurHome\AbstractEntity;

class Task extends AbstractEntity {
    protected $_attributes = array(
        '_isFetchable' => "__fetchable",
        '_adjustedPointValue' => "adjusted_point_value",
        '_alwaysUpvoted' => "always_upvoted",
        '_assignedTo' => "assigned_to",
        '_categoryUri' => "cat",
        '_completionsThisPeriod' => "completions_this_period",
        '_currentlyAssignedUser' => "currently_assigned_user",
        '_dailyCompletions' => "daily_completions",
        '_dateLastCompleted' => "date_of_last_completion",
        '_description' => "description",
        '_id' => "id",
        '_isActive' => "is_active",
        '_isEvent' => "is_event",
        '_isUpvoted' => "is_upvoted",
        '_lateMultiplier' => "late_multiplier",
        '_listType' => "list",
        '_order' => "order",
        '_picture' => "picture",
        '_pointValue' => "point_value",
        '_reminders' => "reminders",
        "_resourceUri" => "resource_uri",
        '_rotatingAssignment' => "rotating_assignment",
        '_scheduleEveryXUnits' => "schedule_every_x_units",
        '_scheduleType' => "schedule_type",
        '_scheduleUnit' => "schedule_unit",
        '_scheduleUnitBreakdown' => "schedule_unit_breakdown",
        '_scheduleXTimesPerUnit' => "schedule_x_times_per_unit",
        '_scheduledDueDate' => "_scheduled_due_date",
        '_scheduledTime' => "scheduled_time",
        '_timeBasedAssignment' => "time_based_assignment",
        '_timeBasedAssignmentPeriod' => "time_based_assignment_period",
        "_timeBasedAssignmentStartDate" => "time_based_assignment_start_date",
        '_timeRequired' => "time_required",
        '_notes' =>  "verbose_description" );
}