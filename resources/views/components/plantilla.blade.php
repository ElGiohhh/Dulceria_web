<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Tareas</title>
    <link rel="stylesheet" type="text/css" href="crud.css">
    
    <style>
        /* Estilos para la lista */
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            margin: 5px 0;
        }
        .task {
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>
<body>
    <h1><center> Lista Sencilla </center></h1>

    <!-- Formulario para crear una tarea -->
    <form id="taskForm">
        <center><input type="text" id="taskInput" placeholder="Nuevo Articulo" required></center>
        <button type="submit">Crear</button>
    </form>

   
    <ul id="taskList">
       
    </ul>

  
    <script>
        const taskForm = document.getElementById("taskForm");
        const taskInput = document.getElementById("taskInput");
        const taskList = document.getElementById("taskList");

        
        function addTask(taskText) {
            const li = document.createElement("li");
            const taskElement = document.createElement("div");
            taskElement.className = "task";

            const taskTextElement = document.createElement("span");
            taskTextElement.textContent = taskText;

            const editButton = document.createElement("button");
            editButton.textContent = "Editar";
            editButton.addEventListener("click", () => {
                const newText = prompt("Editar tarea:", taskText);
                if (newText !== null) {
                    taskTextElement.textContent = newText;
                }
            });

            const deleteButton = document.createElement("button");
            deleteButton.textContent = "Eliminar";
            deleteButton.addEventListener("click", () => {
                li.remove();
            });

            taskElement.appendChild(taskTextElement);
            taskElement.appendChild(editButton);
            taskElement.appendChild(deleteButton);

            li.appendChild(taskElement);
            taskList.appendChild(li);
        }

       
        taskForm.addEventListener("submit", (e) => {
            e.preventDefault();
            const taskText = taskInput.value.trim();
            if (taskText !== "") {
                addTask(taskText);
                taskInput.value = "";
            }
        });
    </script>
</body>
</html>