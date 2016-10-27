import React from 'react'

import ReactDOM from 'react-dom'

import axios from 'axios'

import { Router, Route, Link } from 'react-router'

const paymentElement = document.getElementById('payment-type')


class AddPaymentType extends React.Component {
    constructor (props) {
        super(props)
        this.state = {
            inputKey: ''
        }
    }

    onSaveClick(event) {
        event.preventDefault()
        this.props.onSaveSubmit(this.state.inputKey)

        this.setState ({
            inputKey: ''
        })
    }

    onTextChange(event) {
        const val = event.target.value

        this.setState ({
            inputKey: val
        })
    }
    render() {
        return (
                <div className="row">
                    <h1> Add new payment type </h1>
                    <form>
                        <div className="columns medium-3 pd-l-1 pd-r-1">
                            <input type="text" 
                                value={this.state.inputKey} 
                                onChange={this.onTextChange.bind(this)} 
                                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                            />
                        </div>
                        <div className="columns medium-2 end">
                            <button onClick={this.onSaveClick.bind(this)} className="success button">Save</button>
                        </div>
                    </form>
                </div>
               )
    }
}

const PaymentTable = (props) => (
    <div>
      <table>
        <thead>
          <tr>
            <th>#</th>
            <th>Type</th>
            <th>Author</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          {
              props.types.map(type=> (
              <tr key={type.id}>
                <td>{type.id}</td>
                <td>{type.type}</td>
                <td>{type.author_id}</td>
                <td>{type.status}</td>
              </tr>
             ))
          }
        </tbody>
      </table>
   </div>
)

class PaymentType extends React.Component {

    constructor(props) {
        super(props)

        this.state = {
            type : []
        }

        axios.get('/kiwilauncher/public/admin/account/get-payment-type')
        .then(response=> {
 //           console.log(response.data.type)
            this.setState ({
                type: response.data.type
            })
        })
        .catch(function (error) {
            console.log(error)
        })

    }


    onSave(inputKey) {
        axios.post('/kiwilauncher/public/admin/account/save-payment-type',{type:inputKey})
            .then(response => {
                if(response.data.status_code == 200){
                    console.log(response.data)
                    this.setState ({
                        type: response.data.type
                    })
                }else {
                    console.log(response.data)
                }
            })
            .catch(function (error) {
                console.log(error)
            })
    }

    render() {
        return (
                <section>
                <AddPaymentType onSaveSubmit={this.onSave.bind(this)} />
                <PaymentTable types={this.state.type}/>
                </section>
               )
    }
}

ReactDOM.render(<PaymentType />,paymentElement)
//ReactDOM.render(<AddPaymentType />,paymentElement)
