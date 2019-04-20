import React, { Component } from 'react';
import axios from 'axios';

import ReactDOM from 'react-dom';

export default class Addjob extends React.Component{
    constructor(props){
        super(props);
        this.state={
            skills:[],
        }
    }
    check(e){
        let checked = "skill btn btn-primary btn-sm blank-box";
        let unchecked = "skill btn btn-outline-primary btn-sm blank-box";
        event.target.className = 
            (event.target.className ==checked)
                ?
                    unchecked
                :
                    checked;   
        //alert(event.target.value);
         this.props.skillManagement(event.target.name);     
    }
    click(){
        //this.forceUpdate();
        var but=document.getElementsByClassName('skill');
        var index;
        for (index=0;index<but.length;index++) {
        but[index].className="skill btn btn-outline-primary btn-sm blank-box"; 
        }
       // but.className = "skill btn btn-outline-primary btn-sm blank-box";
        this.props.click();
    }
    render(){
        return(
            
        <div id="form" className="p-3 animated fadeInDown x">
            <h2 className="text-success animated fadeInLeft">Add Jobs</h2>     
            <hr></hr>
            
            <div className="row px-3 mb-2 animated fadeInRight">
                <input 
                    placeholder="Name" 
                    id="input" type="text"  
                    name="Name"
                    onChange={this.props.change} 
                    value={this.props.Name}  className="form-control mb-1" 
                  />

                <textarea 
                    maxLength="120" 
                    className="w-100 form-control mb-1" 
                    name="Description"
                    onChange={this.props.change} 
                    value={this.props.Description} placeholder="Description here ...">
                    </textarea>
            
                <input 
                    placeholder="Maximum time" 
                    id="input" type="text"  
                    name="Time"
                    onChange={this.props.change} 
                    value={this.props.Time}  className="form-control col-6 mb-1" 
                    />
                <input 
                    placeholder="Maximum price" 
                    id="input" type="text"  
                    name="Money"
                    onChange={this.props.change} 
                    value={this.props.Money}  className="form-control col-6 mb-1" 
                    />
                <input 
                    placeholder="Link a reference project" 
                    id="input" type="text"  
                    name="Link"
                    onChange={this.props.change} 
                    value={this.props.Link}  className="form-control mb-2" 
                    />
                 {
                     this.props.skills.map((skill,key) =>{
                         return(
                            <span key={key}> 
                            <input 
                            type="button"
                                placeholder="Enter a relevent key skill"
                                className="fadeInDown skill btn btn-outline-primary btn-sm blank-box"
                                
                                value={skill.name}
                                
                                onClick={this.check.bind(this)}
                                name={
                                    skill.id
                                }
                            /> 
                        </span>
                         )
                     })
                 }   
               
            </div>
            


            <div className=" animated fadeInLeft">
               <button className=" btn btn-outline-primary w-100" onClick={this.click.bind(this)}>Add <i className="fas fa-paper-plane "></i></button>
            </div>
        </div>
        );
    }
}