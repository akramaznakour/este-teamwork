<!-- End PAge Content -->
</div>
<!-- End Container fluid  -->
<!-- footer -->
<footer class="footer"> © 2018 All rights reserved.</footer>
<!-- End footer -->
</div>
<!-- End Page wrapper  -->
</div>
<!-- End Wrapper -->
<script>
    var url = "<?php echo URL; ?>";
    var project_id = "<?php echo $project->id; ?>";
    var user_id = "<?php echo $user->ID; ?>";
</script>

<script type="text/javascript">
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

            echo "g.AddTaskItem(new JSGantt.TaskItem(" . $task->id . ", '" . $task->name . "' , '" . $task->actual_start . "', '" . $task->actual_end . "', '" . $task->style . "', '" . $task->link . "', " . $task->mile . ", '" . $task->responsable . "'," . $task->comp . ", " . $task->group . "," . $task->parent . ", " . $task->open . ", '" . $task->depend . "',  '" . $task->caption . "'    ,  '" . $task->note . "', g));  ";

        }
        ?>

        g.Draw();
    } else {
        alert("Error, unable to create Gantt Chart");
    }
</script>
</div>
<div id="external-Gantt">
    <script type="text/javascript">
        var g = new JSGantt.GanttChart(document.getElementById('external-Gantt'), 'day');

        if (g.getDivId() != null) {
            g.setCaptionType('Resource');  // Set to Show Caption (None,Caption,Resource,Duration,Complete)
            g.setShowTaskInfoLink(1); // Show link in tool tip (0/1)
            g.setDayMajorDateDisplayFormat('dd mon');
            g.setDateTaskDisplayFormat('dd month yyyy HH:MI');
            // Use the XML file parser

            g.Draw();
        } else {
            alert("Error, unable to create Gantt Chart");
        }
    </script>

    <script>
        var currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); // Display the crurrent tab

        function showTab(n) {
            // This function will display the specified tab of the form...
            var x = document.getElementsByClassName("tab");
            x[n].style.display = "block";
            //... and fix the Previous/Next buttons:
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }
            if (n == (x.length - 1)) {
                document.getElementById("nextBtn").innerHTML = "Submit";
            } else {
                document.getElementById("nextBtn").innerHTML = "Next";
            }
            //... and run a function that will display the correct step indicator:
            fixStepIndicator(n)
        }

        function nextPrev(n) {
            // This function will figure out which tab to display
            var x = document.getElementsByClassName("tab");
            // Exit the function if any field in the current tab is invalid:
            if (n == 1 && !validateForm()) return false;
            // Hide the current tab:
            x[currentTab].style.display = "none";
            // Increase or decrease the current tab by 1:
            currentTab = currentTab + n;
            // if you have reached the end of the form...
            if (currentTab >= x.length) {
                // ... the form gets submitted:
                document.getElementById("regForm").submit();
                return false;
            }
            // Otherwise, display the correct tab:
            showTab(currentTab);
        }

        function validateForm() {
            // This function deals with validation of the form fields
            var x, y, i, valid = true;
            x = document.getElementsByClassName("tab");
            y = x[currentTab].getElementsByTagName("input");
            // A loop that checks every input field in the current tab:
            for (i = 0; i < y.length; i++) {
                // If a field is empty...
                if (y[i].value == "") {
                    // add an "invalid" class to the field:
                    y[i].className += " invalid";
                    // and set the current valid status to false
                    valid = false;
                }
            }
            // If the valid status is true, mark the step as finished and valid:
            if (valid) {
                document.getElementsByClassName("step")[currentTab].className += " finish";
            }
            return valid; // return the valid status
        }

        function fixStepIndicator(n) {
            // This function removes the "active" class of all steps...
            var i, x = document.getElementsByClassName("step");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }
            //... and adds the "active" class on the current step:
            x[n].className += " active";
        }
    </script>
