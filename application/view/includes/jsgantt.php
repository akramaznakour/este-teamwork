<script>
    var g = new JSGantt.GanttChart(document.getElementById('embedded-Gantt'), 'week');
    if (g.getDivId() != null) {
        g.setCaptionType('Complete');  // Set to Show Caption (None,Caption,Resource,Duration,Complete)
        g.setQuarterColWidth(36);
        g.setDateTaskDisplayFormat('day dd month yyyy'); // Shown in tool tip box
        g.setDayMajorDateDisplayFormat('mon yyyy - Week ww') // Set format to display dates in the "Major" header of the "Day" view
        g.setWeekMinorDateDisplayFormat('dd mon') // Set format to display dates in the "Minor" header of the "Week" view
        g.setShowTaskInfoLink(1); // Show link in tool tip (0/1)
        g.setShowEndWeekDate(0); // Show/Hide the date for the last day of the week in header for daily view (1/0)
        g.setUseSingleCell(5000); // Set the threshold at which we will only use one cell per table row (0 disables).  Helps with rendering performance for large charts.
        g.setFormatArr('Day', 'Week', 'Month', 'Quarter'); // Even with setUseSingleCell using Hour format on such a large chart can cause issues in some browsers


        <?php
        foreach ($tasks as $task) {

            echo "g.AddTaskItem(new JSGantt.TaskItem(" . $task->id . ", '" . $task->name . "' , '" . $task->actual_start . "', '" . $task->actual_end . "', '" . $task->style . "', '" . $task->link . "', " . $task->mile . ", '" .   $this->model['User']->getUser($task->responsable_id)->first_name.'  '.  $this->model['User']->getUser($task->responsable_id)->last_name. "'," . $task->comp . ", " . $task->group . "," . $task->parent . ", " . $task->open . ", '" . $task->depend . "',  '" . $task->caption . "'    ,  '" . $task->note . "', g));  ";

        }
        ?>

        g.Draw();
    } else {
        alert("Error, unable to create Gantt Chart");
    }
</script>