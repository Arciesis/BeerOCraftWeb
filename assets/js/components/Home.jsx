import React from 'react';
import {Link} from 'react-router-dom';
import LeftPanelMenu from './LeftPanelMenu';

const Home = () => {
  return (
    <div>
      <LeftPanelMenu />
     <Link to="/dashboard">Go to apiPlatform</Link>
    </div>
  );
};

export default Home;
