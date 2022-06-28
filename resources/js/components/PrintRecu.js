import React from 'react';
import ReactDOM from "react-dom";
import Modal from 'react-modal';
import './Styles.css';


// Make sure to bind modal to your appElement (https://reactcommunity.org/react-modal/accessibility/)
Modal.setAppElement('#cart');

export default function PrintRecu(props) {
  let subtitle;
  const [modalIsOpen, setIsOpen] = React.useState(true);
  function openModal() {
    setIsOpen(true);
  }
  const [data, setData] = React.useState(props.data)
  var dataCart = props.data;


  function closeModal() {
    setIsOpen(!props.action);
  }

  return (
    <div>
      <Modal
        isOpen={props.action && modalIsOpen}
        onRequestClose={closeModal}
      >
        <button onClick={closeModal}>close</button>
      

      <div id="invoice-POS">
        <div id="printed_content">
          <center id="logo">
            <div class="logo"></div>
            <div class="info"></div>
            <h2>POS Ltd</h2>
          </center>
          <div class="mid">
            <div class="info">
              <h2>Contact Us</h2>
              <p>
                Address : kader boukar
                Email : boukar@gmail
                phone : 0675501822
              </p>
            </div>
          </div>
        </div>
        <div class="bot">
          <div>
            <table>
              <thead>
                <tr class="tabletitle">
                  <td class="item"><h2>Prod</h2></td>
                  <td class="Hours"><h2>Qty</h2></td>
                  <td class="Rate"><h2>Unit</h2></td>
                  <td class="Rate"><h2>Disc</h2></td>
                  <td class="Rate"><h2>Total</h2></td>
                </tr>
              </thead>
              <tbody>
                {dataCart.map((item) => (
                  <tr class="service">
                    <td class="tableitem"><p class="itemtext"></p></td>
                    <td class="tableitem"><p class="itemtext"></p></td>
                    <td class="tableitem"><p class="itemtext"></p></td>
                    <td class="tableitem"><p class="itemtext"></p></td>
                    <td class="tableitem"><p class="itemtext"></p></td>
                  </tr>
                ))
                }
              </tbody>

              <tr class="tabletitle">
                <td></td>
                <td></td>
                <td></td>
                <td class="Rate"><p class="itemtext">Tax</p></td>
                <td class="Payment"><p class="itemtext"></p></td>
              </tr>
              <tr class="tabletitle">
                <td></td>
                <td></td>
                <td></td>
                <td class="Rate">Total</td>
                <td class="Payment"><h2></h2></td>
              </tr>
            </table>
            <div class="legalcopy">
              <p class="legal "> <strong>** Thank you for visiting **</strong>
                The good which are subject to tax, prices includes tax
              </p>
            </div>
            <div class="serial-number">
              Serial : <span class="serial">123456789</span>&nbsp; &nbsp;
              <span> 24/05/2022 &nbsp; 01:12</span>
            </div>
          </div>
        </div>
      </div >
      </Modal >
    </div >

  );
}
