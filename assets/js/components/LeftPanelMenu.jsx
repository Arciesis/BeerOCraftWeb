import React from 'react';
import {Link, Redirect} from 'react-router-dom';
import BeerStylesMenu from './BeerStylesMenu';
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
        <li>
          <Link to="/dashboard/beer_styles">Styles</Link>

        </li>
      </ul>
    </div>
  );
};

export default LeftPanelMenu;