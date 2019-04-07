import React from 'react';
export default class Makebid extends React.Component{
    constructor(props){
        super(props);
        this.state={
            body:"",
            refrence:"",
            price:"",
            days:"",
        }
        }
        change(){
            this.setState({
                [event.target.name]:event.target.value,
            });
        }
        addBidClick(){
            this.props.click(["mybid","https://www.google.com",this.props.job,200,30]);
            //console.log("make bid has"+this.props.job);
            
        }
        render(){
        return(
            <div  className=" " id="formM">
              
                <input 
                    placeholder="One line proposal"
                    className="form-control " name="body" 
                    onChange={this.change.bind(this)} 
                    value={this.state.body}>
                </input>
                <input 
                    placeholder="Refference project"
                    className="form-control" name="refrence" 
                    onChange={this.change.bind(this)} 
                    value={this.state.refrence}>
                </input>
                <div className="row lay">
                <input 
                    placeholder="Max Price"
                    className="col-6 form-control" name="price" 
                    onChange={this.change.bind(this)} 
                    value={this.state.price}>
                </input>
                <input 
                    placeholder="Max Days"
                    className="col-6 form-control" name="days" 
                    onChange={this.change.bind(this)} 
                    value={this.state.days}>
                </input>
                </div>
                <button  
                    className="btn btn-lg btn-success w-100"
                     onClick={this.addBidClick.bind(this)}>
                    <i className="fas fa-paper-plane "></i> 
                        Make Bid
                </button>
            </div>
        )
    }
}