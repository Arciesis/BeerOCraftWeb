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
    </div>
  );
};

export default Home;
