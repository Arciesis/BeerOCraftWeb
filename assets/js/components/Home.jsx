import React, { useEffect } from 'react';
import LeftPanelMenu from './LeftPanelMenu';
import axios from 'axios';
import BeerStylesMenu from './BeerStylesMenu';
import {Redirect} from 'react-router-dom';
import Register from './Register';


const Home = () => {



  return (
    <div>
      <div>
      <LeftPanelMenu />
      </div>
      <div>
        <BeerStylesMenu />
      </div>
      <div>
        <Register />
      </div>
    </div>
  );
};

export default Home;
