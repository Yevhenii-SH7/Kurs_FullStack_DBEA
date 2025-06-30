import React, { useState } from "react";
import styled from "styled-components";

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

function Lichttoggle() {
  return (
    <div className="App">
      <h1>Lichtschalter</h1>
      <Lichtschalter />
    </div>
  );
}
export default Lichttoggle;