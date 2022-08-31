import axios from 'axios';
import {Redirect} from 'react-router-dom';
import React, {useEffect} from 'react';
import {render} from 'react-dom';

const Register = () => {

};

render (
  <div>
    <form onSubmit={this.handleSubmit}></form>
    <div>
      <label>
        Email:
        <input type={'email'} value={this.state.email} onChange={this.handleInputChange} required/>
      </label>
    </div>
    <div>
      <label>
        Username:
        <input type={'text'} value={this.state.username} onChange={this.handleInputChange} required/>
      </label>
    </div>
    <div>
      <label>
        Password:
      <input type={'password'} value={this.state.pswd} onChange={this.handleInputChange} required/>
      </label>
    </div>
    <div>
      <label>
        Confirm Password:
      <input type={'password'} value={this.state.pswdConfirm} onChange={this.handleInputChange} required/>
      </label>
    </div>
  </div>
);


export default Register;
