import React from 'react';
import  ReactDOM from 'react-dom';
export default class Table extends React.Component{
    constructor(props){
        super(props);
    }
    componentWillUnmount() {
        //this.removeEventListener('click');
        window.removeEventListener("click",this.props.delete);
    }
    render(){
        return(
            <ul className="list-group">
                <li className=" list-group-item active">All Jobs</li>
                <div className="box ">
                {this.props.jobs.length==0?
                    <li className="list-group-item "> Empty List...</li>://if jobs array is empty 
                    this.props.jobs.map((job,key) =>  // if there are some jobs
                        <ul  key={key} className=" list-group list-group-horizontal   w-100">       
                            <li onClick={this.props.click.bind(this,job)} className={this.props.delete?"list-group-item col-9 mouse":"list-group-item col-12 mouse"} >{job.body}</li>
                           {this.props.delete?
                                <button id={job.id} className="list-group-item delete p-2  col-3 btn btn-outline-danger" onClick={this.props.delete}>
                                    <i className="fas fa-trash-alt"></i> Delete
                                </button>
                                :
                                null
                           }
                            
                         </ul>
                    )
                }            
                </div>
            </ul>
            
        );
    }
}