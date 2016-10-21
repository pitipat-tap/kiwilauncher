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

const PaymentTable = () => {

  const item = [
    {id:1,type:'office',author:'peat',status:'wait'},
    {id:2,type:'office',author:'peat',status:'wait'},
    {id:3,type:'office',author:'peat',status:'wait'},
    {id:4,type:'office',author:'peat',status:'wait'},
  ]
  return (
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
             item.map(item => (
              <tr>
                <td>iteam.id</td>
                <td>iteam.type</td>
                <td>iteam.author</td>
                <td>iteam.status</td>
              </tr>
             ))
          }
        </tbody>
      </table>
   </div>
  )
}

const Account = () => (
  <section>
    <AddPaymentType />
    <PaymentTable />
  </section>
)

ReactDOM.render(<Account />,paymentElement)
//ReactDOM.render(<AddPaymentType />,paymentElement)
