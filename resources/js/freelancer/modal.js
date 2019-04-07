import React from 'react';
export default class Modal extends React.Component{
    constructor(props) {
      super(props)
    
      this.state = {
         
      }
    }
    render() {
      return (
        <div className="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div className="modal-dialog w-75" role="document">
                <div className="modal-content animated jello">
                <div className="modal-header bg-primary text-white">
                    <h5 class="modal-title">Bid Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div className="modal-body text-dark">
                    <div className="row">
                        <div className="col-md-6">
                            <h3 className="">{this.props.bidForDescription.user?this.props.bidForDescription.user.name:"lol"}</h3>
                        </div>
                        <div className="col-md-6 text-success text-right">
                         {this.props.bidForDescription.user?this.props.bidForDescription.user.email:"lol"}
                        </div>
                    </div>
                    The freelances has made a proposal "{this.props.bidForDescription.proposal}" 
                    on your job {this.props.bidForDescription.jobs?this.props.bidForDescription.jobs.body:"lol"}.
                    Click on his name above to view profile.<br></br>
                    Or click here to approve this bid. <br></br>
                    {this.props.approve?
                        <button onClick={this.props.approve} 
                            className="btn btn-outline-success w-100 mt-4">
                                Accept Bid
                        </button>
                        :
                        null
                    }
                </div>
                <div className="modal-footer bg-white text-left">
                    <span className="btn  btn-sm btn-outline-danger disabled" 
                    title="Maximum Money client is willing to pay">
                        <i className="fas fa-rupee-sign mr-2"></i> 
                        {this.props.bidForDescription.price}
                    </span>
                    <span className="btn btn-sm btn-outline-dark disabled   ">
                            <i className="fa fa-clock mr-2"></i> 
                            {this.props.bidForDescription.time} Days
                    </span> 
                    
                </div>
                </div>
            </div>
        </div>
      )
    }
}