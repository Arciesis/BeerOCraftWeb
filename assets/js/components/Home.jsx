import React from 'react';
import LeftPanelMenu from './LeftPanelMenu';
import axios from 'axios';
import BeerStylesMenu from './BeerStylesMenu';
import {Redirect} from 'react-router-dom';


const Home = () => {
  const handleDashboard = () => {
    axios.get('http://beerocraft.localhost/dashboard')
      .then(response => JSON.stringify(response))
      .catch(errors => console.log(errors))
  }

  return (
    <div>
      <LeftPanelMenu />
      <BeerStylesMenu />
    </div>
  );
};

export default Home;
