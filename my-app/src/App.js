import "./App.css";
import React from "react";
import { useState } from "react";
import Counter from "./Count";
import Lichtschalter from "./Lichtschalter";
import PokemonFetcher from "./PockemonUseEffect";
import ToDoList from "./ToDoList";

const MyButton = ({ count, onClick }) => {
  return <button onClick={onClick}>
    Clicked {count} times
    </button>;
}

export default function MyApp() {
  const [count, setCount] = useState(0);

  function handleClick() {
    setCount(count + 1);
  }

  return (
    <div>
      <Counter />
      <Lichtschalter />
      <h1>Counters that update separately</h1>
      <MyButton count={count} onClick={handleClick} />
      <MyButton count={count} onClick={handleClick} />
      <PokemonFetcher />
      <ToDoList />
    </div>
  );
}
