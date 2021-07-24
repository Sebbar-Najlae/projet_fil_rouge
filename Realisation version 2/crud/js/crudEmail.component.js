// Application
class CrudEmail extends React.Component {
    constructor(props) {
        super(props)

        this.state = {
            emailsArray: []
        };
    }
    componentDidMount() {
        this.chargementDonnees();
    }
    chargementDonnees() {

        var emailsArray = null;

        // affichage de données par Ajax

        $.getJSON("api/getEmail.php",
            function (data) {
                this.setState({ emailsArray: data });
            }.bind(this))
            .fail(function (jqXHR, textStatus, errorThrown) {
                console.log(errorThrown);
            });
    }
    //add Email
    addemail() {
        $.ajax({
            url: "api/addEmail.php",
            method: "POST",
            data: {

                email: addemail.value,
                subject: addsubject.value,
                body: addbody.value,
                dateSend: adddateSend.value,

            },
            success: function (data) {
                this.chargementDonnees()
                $("#exampleModalCenter").modal('hide');
                console.log(data)
            }.bind(this)
        })
            .preventDefault();
    }
    // Remove Email
    removeemail(id) {
        $.ajax({
            url: "api/deleteEmail.php",
            method: "POST",
            data: {
                id: id
            },
            success: function (data) {
                //   $(this).parent().remove();
                this.chargementDonnees()
            }.bind(this)
        })

    }


    //update 
    showUpdateModel(email) {
        this.setState({ email: email })
    }



    //update Email
    updateemail() {
        console.log(this.state.email)
        $.ajax({
            url: "api/updateEmail.php",
            method: "POST",
            data: {
                id_email: this.state.email,
              

                email: addemail.value,
                subject: addsubject.value,
                body: addbody.value,
                dateSend: adddateSend.value
            },
            success: function (data) {
                this.chargementDonnees()
                $("#exampleModalCenter1").modal('hide');
                console.log(data)
            }.bind(this)
        })
        e.preventDefault();
    }






    onChangeInput(e) {
        // this.setState({value: e.target.value})
    }

    render() {
        let emailsArray = this.state.emailsArray.map((email) => {
            return (
                <Email
                    key={email.id}
                    email={email}
                    onClickClose={this.removeemail.bind(this, email.id)}
                    onClickUpdate={this.showUpdateModel.bind(this, email)}
                />
            )
        })

        return (
            <div className="container">
                {/* ADD Model */}
                <div className="modal fade" id="exampleModalCenter" tabIndex={-1} role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div className="modal-dialog modal-dialog-centered" role="email">
                        <div className="modal-content">
                            <div className="modal-header">
                                <h5 className="modal-title" id="exampleModalCenterTitle">Ajouter Email</h5>
                                <button type="button" className="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div className="modal-body">
                                <form
                                    id="form-add"
                                    className="form-horizontal"
                                    onSubmit={this.addemail.bind(this)}>


                                    <div className="form-row">
                                        <div className="form-group col-12">
                                            <label htmlFor="inputMatricule4">Email</label>
                                            <input type="email" className="form-control email" id="addemail" placeholder="email"/>
                                            

                                        </div>
                                    </div>
                                    <div className="form-row">
                                        <div className="form-group col-12">
                                            <label htmlFor="inputMatricule4">Objet</label>
                                            <input type="text" className="form-control subject" id="addsubject" placeholder="Objet" />
                                        </div>
                                    </div>
                                    <div className="form-row">
                                        <div className="form-group col-12">
                                            <label htmlFor="inputMatricule4">Corps</label>
                                            <input type="text" className="form-control body" id="addbody" placeholder="Corps" />
                                        </div>
                                    </div>
                                    <div className="form-row">
                                        <div className="form-group col-12">
                                            <label htmlFor="inputLast4">Date d'envoie</label>
                                            <input type="date" className="form-control dateSend" id="adddateSend" placeholder="Date" />
                                        </div>
                                    </div>

                                 



                                    <div className="input-group text-right">
                                        <div className="input-group-btn">
                                            <button type="submit" className="btn btn-primary submit  ">AJOUTER EMAIL</button>

                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div className="modal-footer">
                            </div>
                        </div>
                    </div>
                </div>
                {/* edit Model */}
                <div className="modal fade" id="exampleModalCenter1" tabIndex={-1} role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div className="modal-dialog modal-dialog-centered" role="email">
                        <div className="modal-content">
                            <div className="modal-header">
                                <h5 className="modal-title" id="exampleModalCenterTitle1"> Email</h5>
                                <button type="button" className="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div className="modal-body">
                                <form
                                    id="form-edit"
                                    className="form-horizontal"
                                    onSubmit={this.updateemail.bind(this)}>


                                    <div className="form-row">
                                        <div className="form-group col-12">
                                            <label htmlFor="inputName4">Email</label>
                                            <input type="email"  
                                            // value={this.state.document.document_name} onChange={(e) => this.setState({ document: {...this.state.document, document_name: e.target.value } })}
                                             className="form-control email" id="addemail" />


                                        </div>
                                    </div>
                                    <div className="form-row">
                                        <div className="form-group col-12">
                                            <label htmlFor="inputLast4">Date d'envoie</label>
                                            <input type="date" className="form-control dateSend" id="adddateSend" placeholder="date" />
                                        </div>
                                    </div>

                                   



                                    <div className="input-group text-right">
                                        <div className="input-group-btn">
                                            <button type="submit" className="btn btn-primary submit  ">AJOUTER DOCUMENT</button>

                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div className="modal-footer">
                            </div>
                        </div>
                    </div>
                </div>


                <div className="table-responsive">
                    <table className="table table-hover">
                        <thead className="thead">
                            <tr>
                                <th scope="col">Email</th>
                                <th scope="col">Objet</th>
                                <th scope="col">Corps</th>
                                <th scope="col">Date d'envoie</th>

                                <th scope="col"></th>
                                <th scope="col"></th>


                            </tr>
                        </thead>
                        <tbody>

                            {emailsArray}
                        </tbody>
                    </table>


                </div>
            </div>

        )
    }
}