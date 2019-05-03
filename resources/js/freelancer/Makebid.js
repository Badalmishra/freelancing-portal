import React from 'react';
export default class Makebid extends React.Component{
    constructor(props){
        super(props);
        this.state={
            body:"",
            refrence:"",
            price:"",
            days:"",
            form:0,
        }
        }
        change(){
            this.setState({
                [event.target.name]:event.target.value,
            });
        }
        addBidClick(){
            const payload =[
                this.state.body,
                this.state.refrence,
                this.props.job,
                this.state.price,
                this.state.days
            ];
            this.props.click(payload);
            this.setState({
                body:"",
                refrence:"",
                job:"",
                price:"",
                days:""
            });
            //console.log("make bid has"+this.props.job);
        }
        toggleForm(){
            this.setState({form:!this.state.form});
        }
        render(){
        return(
            <div  className=" " id="formM">
              <button
                    onClick={this.toggleForm.bind(this)} 
                    className="w-100 btn btn-outline-dark btn-sm text-info">
                    {this.state.form?"Hide":"Show"}    Bid Form
                    </button>
              {this.state.form?  
              <span className="animated fadeInDown">  
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
            </span>
            :null}
            </div>
        )
    }
}