import React, {useEffect} from 'react';
import axios from 'axios';
import data from '../../../src/Controller/styles.json';

const BeerStylesMenu = () => {

useEffect(() => {
  const stylesData = JSON.stringify(data);

  const styles = JSON.parse(stylesData);

  const customAxios = axios.create({
    baseURL: 'http://beerocraft.loaclhost/dashboard/',
    headers: {'Access-Control-Allow-Origin': '*'}
  });

  for (const key in styles) {
    console.log(styles[key]);
    console.log(' === ')
    customAxios.post('beer_styles/', styles[key])
      .then((response) => console.log(response))
      .catch((erros) => console.log(erros))

  };
}, [])


  return (
    <div>
      <p>coucou</p>
    </div>
  )
}

export default BeerStylesMenu;
