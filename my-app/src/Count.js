import { useState } from "react";

const Task = ({task}) => {
    return (
      <li className={task.completed ? 'completed' : 'not-completed'}>
        {task.text}
      </li>
    );
  };
  
  function TaskList() {
    const tasks = [
      { text: "Task 1", completed: false },
      { text: "Task 2", completed: true },
      { text: "Task 3", completed: false },
    ];
    return (
      <ul className="task-list">
        {tasks.map((task, index) => (
          <Task key={index} task={task} />
        ))}
      </ul>
    );
  }
  const Counter = () => {
    const [count, setCount] = useState(0);
    return (
      <div>
        <TaskList />
        <p>Count: {count}</p>
        <button onClick={() => setCount(count + 1)}>Increment</button>
      </div>
    );
  } 
  export default Counter;