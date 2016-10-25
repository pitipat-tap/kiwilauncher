import React from 'react'

import ReactDOM from 'react-dom'

import { Router, Route, Link } from 'react-router'

const paymentElement = document.getElementById('payment-type')

const AddPaymentType = () => {
    return (
      <div className="row">
        <h1> Add new payment type </h1>
        <form>
          <div className="columns medium-3 pd-l-1 pd-r-1">
            <input type="text" name="type"/>
          </div>
          <div className="columns medium-2 end">
            <button id="saveType" type="submit" className="success button">Save</button>
          </div>
        </form>
      </div>
  )
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
        console.log(this.state.type)
    }
    

    render() {
        return (
                <section>
                <AddPaymentType />
                <PaymentTable types={this.state.type}/>
                </section>
               )
    }
}

ReactDOM.render(<PaymentType />,paymentElement)
//ReactDOM.render(<AddPaymentType />,paymentElement)
