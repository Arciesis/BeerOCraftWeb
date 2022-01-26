import React, { useEffect } from 'react';
import LeftPanelMenu from './LeftPanelMenu';
import axios from 'axios';
import BeerStylesMenu from './BeerStylesMenu';
import {Redirect} from 'react-router-dom';


const Home = () => {



  return (
    <div>
      <LeftPanelMenu />
      <BeerStylesMenu />
    </div>
  );
};

export default Home;
