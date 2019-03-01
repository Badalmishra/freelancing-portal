import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class Addjob extends React.Component{
    constructor(props){
        super(props);
    }
    render(){
        return(
        <div id="form" className="p-3">
            <h2 className="text-success">Add Jobs</h2>     
            <hr></hr>
            
            <div className="row px-3 mb-2">
                <input 
                    placeholder="Name" 
                    id="input" type="text"  
                    onChange={this.props.changeName} 
                    value={this.props.Name}  className="form-control mb-1" 
                  />

                <textarea 
                    maxLength="120" 
                    className="w-100 form-control mb-1" 
                    onChange={this.props.changeDescription} 
                    value={this.props.Description} placeholder="Description here ...">
                    </textarea>
            
                <input 
                    placeholder="Maximum time" 
                    id="input" type="text"  
                    onChange={this.props.changeTime} 
                    value={this.props.Time}  className="form-control col-6 mb-1" 
                    />
                <input 
                    placeholder="Maximum price" 
                    id="input" type="text"  
                    onChange={this.props.changeMoney} 
                    value={this.props.Money}  className="form-control col-6 mb-1" 
                    />
                <input 
                    placeholder="Link a reference project" 
                    id="input" type="text"  
                    onChange={this.props.changeLink} 
                    value={this.props.Link}  className="form-control " 
                    />
            </div>
            


            <div className="">
               <button className=" btn btn-outline-primary w-100" onClick={this.props.click}>Add <i className="fas fa-paper-plane "></i></button>
            </div>
        </div>
        );
    }
}