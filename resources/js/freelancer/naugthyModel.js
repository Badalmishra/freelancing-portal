import React from 'react';
export default class NaughtyModal extends React.Component{
    constructor(props) {
      super(props)
    
      this.state = {
         
      }
     
    }
    componentDidUpdate(){
    }
    render() {
      return (
        <div className="modal fade" id="naughtyModal"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div className="modal-dialog w-75" role="document">
                <div className="modal-content animated jello">
                <div className="modal-header bg-primary text-white">
                    <h5 className="modal-title">All Notifications</h5>
                        <button type="button" className="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div className="modal-body text-dark">
                    <ul className="list-group">
                        {
                            this.props.noughties.map(naughty => {
                            return(<li className="list-group-item " key={naughty.id}>
                                {naughty.body} Please check active projects. For Project: {naughty.jobs.body}
                                <br></br>
                                <small className="text-secondary">{naughty.created_at}</small>
                            </li>)
                            
                        })
                    }

                    </ul>
                </div>
                </div>
            </div>
        </div>
      )
    }
}