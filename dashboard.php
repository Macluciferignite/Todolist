<!DOCTYPE html>
<html>
<head>
    <title>To-Do List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: blanchedalmond;
            margin: 0;
            padding: 0;
        }

        #todo-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        .task {
            margin: 10px 0;
            padding: 10px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .task input[type="text"] {
            flex: 1;
            padding: 8px;
            border: none;
            border-radius: 3px;
            font-size: 16px;
        }

        .task button {
            padding: 5px 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            font-size: 14px;
            margin-right: 5px;
        }

        .task button.complete {
            background-color: #5cff5c;
            color: #fff;
        }

        .task button.delete {
            background-color: #ff5c5c;
            color: #fff;
        }

        .priority-high {
            background-color: #ff5c5c;
            color: #fff;
        }

        .priority-medium {
            background-color: #ffca5c;
        }

        .priority-low {
            background-color: #5cff5c;
            color: #fff;
        }

        .search-filter {
            margin-top: 10px;
            text-align: center;
        }

        .my-day {
            margin-top: 20px;
            text-align: center;
        }

        .task input[type="checkbox"] {
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <div id="todo-container">
        <h2>To-Do List</h2>
        <div>
            <input type="text" id="task-input" placeholder="Add a new task">
            <select id="priority">
                <option value="high">High Priority</option>
                <option value="medium">Medium Priority</option>
                <option value="low">Low Priority</option>
            </select>
            <button id="add-task-button">Add</button>
        </div>
        <div class="search-filter">
            <input type="text" id="task-filter" placeholder="Search or Filter tasks">
        </div>
        <div id="task-list"></div>
        <div class="my-day">
            <h3>My Day</h3>
            <div id="my-day-list"></div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const taskInput = document.getElementById("task-input");
            const addTaskButton = document.getElementById("add-task-button");
            const taskList = document.getElementById("task-list");
            const taskFilter = document.getElementById("task-filter");
            const prioritySelect = document.getElementById("priority");
            const myDayList = document.getElementById("my-day-list");

            addTaskButton.addEventListener("click", function () {
                const taskText = taskInput.value.trim();
                const priority = prioritySelect.value;

                if (taskText !== "") {
                    addTask(taskText, priority);
                    taskInput.value = "";
                }
            });

            function addTask(text, priority) {
                const taskItem = document.createElement("div");
                taskItem.className = `task priority-${priority}`;
                const taskText = document.createElement("input");
                taskText.type = "text";
                taskText.value = text;
                const completeButton = document.createElement("button");
                completeButton.className = "complete";
                completeButton.textContent = "Complete";
                completeButton.addEventListener("click", function () {
                    taskItem.classList.toggle("completed");
                });
                const deleteButton = document.createElement("button");
                deleteButton.className = "delete";
                deleteButton.textContent = "Delete";
                deleteButton.addEventListener("click", function () {
                    taskItem.remove();
                });
                taskItem.appendChild(taskText);
                taskItem.appendChild(completeButton);
                taskItem.appendChild(deleteButton);
                taskList.appendChild(taskItem);

                // Add to My Day
                const myDayTask = document.createElement("div");
                myDayTask.className = `task priority-${priority}`;
                const myDayText = document.createElement("input");
                myDayText.type = "text";
                myDayText.value = text;
                const myDayCheckbox = document.createElement("input");
                myDayCheckbox.type = "checkbox";
                myDayCheckbox.addEventListener("change", function () {
                    if (myDayCheckbox.checked) {
                        myDayTask.classList.add("completed");
                    } else {
                        myDayTask.classList.remove("completed");
                    }
                });
                myDayTask.appendChild(myDayCheckbox);
                myDayTask.appendChild(myDayText);
                myDayList.appendChild(myDayTask);
            }

            taskFilter.addEventListener("input", function () {
                const filterText = taskFilter.value.trim().toLowerCase();
                const tasks = document.querySelectorAll(".task");

                tasks.forEach((task) => {
                    const taskText = task.querySelector("input[type='text']").value.toLowerCase();
                    if (taskText.includes(filterText)) {
                        task.style.display = "flex";
                    } else {
                        task.style.display = "none";
                    }
                });
            });
        });
    </script>
</body>
</html>
