import React, { useState } from "react";

function ToDoList() {
  const [todos, setTodos] = useState([]);
  const [inputValue, setInputValue] = useState("");

  function handleChange(e) {
    setInputValue(e.target.value);
  }

  function handleSubmit(e) {
    e.preventDefault();
    setTodos([...todos, inputValue]);
    setInputValue("");
  }

  const handleDelete = (index) => {
    const newTodos = [...todos];
    newTodos.splice(index, 1);
    setTodos(newTodos);
  };

  return (
    <div>
      <h1> Deine Todo-Liste</h1>
      <form>
        <input type="text" value={inputValue} onChange={handleChange} />
        <button onClick={handleSubmit}>Todo hinzufügen</button>
      </form>
      <ul>
        {todos.map((todo, index) => (
          <li key={todo}>
            {todo}
            <button onClick={() => handleDelete(index)}>löschen</button>
          </li>
        ))}
      </ul>
    </div>
  );
}

export default ToDoList;
