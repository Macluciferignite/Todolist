// JavaScript for To-Do List
$(document).ready(function () {
    // Array to store tasks
    var tasks = [];

    // Function to add a new task
    function addTask(taskText) {
        var task = {
            text: taskText,
            completed: false
        };
        tasks.push(task);
        updateTaskList();
    }

    // Function to update the task list
    function updateTaskList() {
        var $todoList = $("#todo-list");
        $todoList.empty();

        for (var i = 0; i < tasks.length; i++) {
            var task = tasks[i];
            var $taskItem = $("<li>").text(task.text);

            if (task.completed) {
                $taskItem.addClass("completed");
            }

            // Add a click handler to mark a task as completed
            $taskItem.click(function () {
                $(this).toggleClass("completed");
                var index = $todoList.find("li").index($(this));
                tasks[index].completed = !tasks[index].completed;
            });

            $todoList.append($taskItem);
        }
    }

    // Event handler for adding a new task
    $("#add-task").click(function () {
        var taskText = $("#new-task").val().trim();
        if (taskText !== "") {
            addTask(taskText);
            $("#new-task").val("");
        }
    });

    // Event handler for pressing Enter in the input field
    $("#new-task").keypress(function (e) {
        if (e.which === 13) {
            var taskText = $(this).val().trim();
            if (taskText !== "") {
                addTask(taskText);
                $(this).val("");
            }
        }
    });
});
