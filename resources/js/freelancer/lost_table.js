import React from 'react';
import  ReactDOM from 'react-dom';
export default class Table extends React.Component{
    constructor(props){
        super(props);
    }
    componentWillUnmount() {
        //this.removeEventListener('click');
        //window.removeEventListener("click",this.props.delete);
    }
    render(){
        return(
            <span>
                
                {this.props.jobs.length==0?
                    <li className="list-group-item "> Empty List...</li>
                    ://if jobs array is empty 
                    this.props.jobs.map((job,key) =>  // if there are some jobs
                           
                            <li  key={key} onClick={this.props.click.bind(this,job)} className="list-group-item  mouse" >{job.body}</li>
                        
                    )
                }            
            </span>
            
        );
    }
}