import React from 'react'

import ReactDOM from 'react-dom'

import axios from 'axios'

import { Router, Route, Link } from 'react-router'

const paymentElement = document.getElementById('payment-type')

class AddPaymentType extends React.Component {
    constructor (props) {
        super(props)
        this.state = {
            addType : ''
        }
    }

    onSaveClick(event) {
        event.preventDefault()
        this.props.onSaveSubmit(this.state.addType)
    }

    onTextChange(event) {
        const val = event.target.value
        console.log(val)

        this.setState ({
            addType : val
        })
    }
    render() {
        return (
                <div className="row">
                    <h1> Add new payment type </h1>
                    <form>
                        <div className="columns medium-3 pd-l-1 pd-r-1">
                            <input type="text" value={this.state.addType} onChange={this.onTextChange.bind(this)} />
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
                <td>{type.author}</td>
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
            type : [
              {id:1,type:'office',author:'peat',status:'wait'},
              {id:2,type:'office',author:'peat',status:'wait'},
              {id:3,type:'office',author:'peat',status:'wait'},
              {id:4,type:'office',author:'peat',status:'wait'},
            ]
        }
    }

    onSave(addType) {
        axios.get(`http://www.omdbapi.com/?s=${addType}&plot=short&r=json`)
            .then(response => {
                console.log(response.data.Search)
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
