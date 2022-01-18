import React from 'react';
import {Link} from 'react-router-dom';
// import LeftPanelMenu from '../../styles/LeftPanelMenu.css';

const LeftPanelMenu = () => {
  return (
    <div className="left-panel-menu-wrapper">
      <ul className="left-panel-menu-list">
        <li>
          <Link to="/dashboard/fermentables/">Fermentables</Link>
        </li>
        <li>
          <Link to="/dashboard/hops">Hops</Link>
        </li>
        <li>
          <Link to="/dashboard/yeasts">Yeasts</Link>
        </li>
        <li>
          <Link to="/dashboard/boiler_equipments">Boiler Equipments</Link>
        </li>
      </ul>
    </div>
  );
};

export default LeftPanelMenu;