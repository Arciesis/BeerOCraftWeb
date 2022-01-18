import React, {useEffect} from 'react';
import {Link} from 'react-router-dom';
import LeftPanelMenu from './LeftPanelMenu';
import axios from 'axios';

const Home = () => {
  const handleDashboard = () => {
    axios.get('http://beerocraft.localhost/dashboard')
      .then(response => JSON.stringify(response))
      .catch(errors => console.log(errors))
  }

  return (
    <div>
      <LeftPanelMenu />
    <button onClick={handleDashboard()}>go to dashboard</button>
    </div>
  );
};

export default Home;
