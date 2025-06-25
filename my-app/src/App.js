import "./App.css";
import React from "react";
import { useState } from "react";
import styled from "styled-components";

/* const Task = ({task}) => {
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
const Count = () => {
  const [count, setCount] = useState(0);
  return (
    <div>
      <p>Count: {count}</p>
      <button onClick={() => setCount(count + 1)}>Increment</button>
    </div>
  );
} */

const StyledText = styled.p`
  color: ${(props) => (props.isOn ? "red" : "green")};
  background-color: ${(props) => (props.isOn ? "lightgreen" : "lightcoral")};
  font-size: 24px;
`;

const Lichtschalter = () => {
  const [isOn, setIsOn] = useState(false);

  return (
    <div onClick={() => setIsOn(!isOn)}>
      <StyledText isOn={isOn}>
        {isOn ? "Licht is on" : "Licht is off"}
      </StyledText>
    </div>
  );
};

function App() {
  return (
    <div className="App">
      <h1>Lichtschalter</h1>
      <Lichtschalter />
    </div>
  );
}

export default App;
