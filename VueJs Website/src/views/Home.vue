<template>
  <div class="container">
    <Header title="Task Tracker" @toggle-add-form="toggleForm" />
    <div v-if="showAddTask">
      <AddTask @newTaskCreated="addTask" />
    </div>
    <Tasks
      @toggle-reminder="toggleReminder"
      @delete-task="deleteTask"
      :tasks="tasks"
    />
  </div>
</template>

<script>
import Header from "../components/Header";
import Tasks from "../components/Tasks";
import AddTask from "../components/AddTask.vue";
// import axios from "axios";
export default {
  name: "App",
  components: {
    Header,
    Tasks,
    AddTask,
  },
  data() {
    return {
      tasks: [],
      showAddTask: false,
    };
  },
  methods: {
    async deleteTask(id) {
      if (confirm("Are You Sure ?")) {
        const res = await fetch(`api/task/${id}`, {
          method: "DELETE",
        });
        res.status === 200
          ? (this.tasks = this.tasks.filter((task) => task.id !== id))
          : alert("Error Deleting Task");
      }
    },
    async toggleReminder(id) {
      const taskToToggle = await this.fetchTask(id);
      const updateTask = { ...taskToToggle, reminder: !taskToToggle.reminder };
      console.log(updateTask);
      const res = await fetch(`/api/task/${id}`, {
        method: "PUT",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify(updateTask),
      });
      const data = await res.json();
      console.log(data);
      if (data == true) {
        this.tasks = this.tasks.map((task) =>
          task.id === id ? { ...task, reminder: data.reminder } : task
        );
      }
    },
    async addTask(task) {
      const res = await fetch("api/task", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify(task),
      });
      const data = await res.json();
      this.tasks = [data, ...this.tasks];
    },
    toggleForm() {
      this.showAddTask = !this.showAddTask;
    },
    async fetchTasks() {
      const res = await fetch("api/task");
      const data = await res.json();
      return data;
    },
    async fetchTask(id) {
      const res = await fetch(`api/task/${id}`);
      const data = await res.json();
      return data;
    },
  },
  async created() {
    this.tasks = await this.fetchTasks();
    // this.tasks = [
    //   {
    //     id: 1,
    //     text: "Doctors Appointment",
    //     day: "1st March at 2:20pm",
    //     reminder: true,
    //   },
    //   {
    //     id: 2,
    //     text: "Meeting at School",
    //     day: "3st March at 5:00pm",
    //     reminder: true,
    //   },
    //   {
    //     id: 3,
    //     text: "Shopping",
    //     day: "1st March at 2:20pm",
    //     reminder: false,
    //   },
    // ];
  },
};
</script>

<style>
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400&display=swap");
* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}
body {
  font-family: "Poppins", sans-serif;
}
.container {
  max-width: 500px;
  margin: 30px auto;
  overflow: auto;
  min-height: 300px;
  border: 1px solid steelblue;
  padding: 30px;
  border-radius: 5px;
}
.btn {
  display: inline-block;
  background: #000;
  color: #fff;
  border: none;
  padding: 10px 20px;
  margin: 5px;
  border-radius: 5px;
  cursor: pointer;
  text-decoration: none;
  font-size: 15px;
  font-family: inherit;
}
.btn:focus {
  outline: none;
}
.btn:active {
  transform: scale(0.98);
}
.btn-block {
  display: block;
  width: 100%;
}
</style>
