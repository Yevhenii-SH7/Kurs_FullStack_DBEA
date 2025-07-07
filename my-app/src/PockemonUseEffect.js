import { useState, useEffect } from "react";

const PokemonFetcher = () => {
    const [pokemon, setPokemon] = useState({});
    
    useEffect(() => {
      async function fetchPokemon() {
        const randomId = Math.floor(Math.random() * 151) + 1;
        const response = await fetch(`https://pokeapi.co/api/v2/pokemon/${randomId}`);
        const data = await response.json();
        setPokemon(data);
      }
      fetchPokemon();
    }, []);
    
    return (
        <div>
            {pokemon ? <h2>{pokemon.name}</h2> : <p>Loading...</p>}
        </div>
    );
}
export default PokemonFetcher;