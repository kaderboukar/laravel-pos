import React from 'react';
import Modal from 'react-modal';
import './Styles.css';
import { v4 as uuidv4 } from 'uuid';
import logo from '../../../public/images/logo.png';
import { useReactToPrint } from 'react-to-print';


// Make sure to bind modal to your appElement (https://reactcommunity.org/react-modal/accessibility/)
Modal.setAppElement('#cart');

export default function PrintRecu(props) {
  const { data, action, dataOrders } = props

  const componentRef = React.useRef();
  const handlePrint = useReactToPrint({
    content: () => componentRef.current,
  });

  return (
    <div>
      <Modal
        isOpen={!!action}
        ariaHideApp={false}
        contentLabel="Selected Option"
        appElement={document.getElementById('app')}
      >
        <div id="invoice-POS"  ref={componentRef}>
          <div id="printed_content">
            <center id="logo">
              <img src={logo} className="logo" />
              <div className="info"><h2>LINA MARKET</h2></div>
            </center>
            <div className="mid">
              <h2>Contact Us</h2>
              <p>Address : GAYA  NOUVEAU  CARRE   -  Email : linamarket2022@gmail  -  phone : +227 96 37 37 61 / +212 608 355 454
              </p>
            </div>
          </div>
          <div className="bot">
            <table>
              <thead>
                <tr className="tabletitle">
                  <td className="item"><h2>Prod</h2></td>
                  <td className="Hours"><h2>Qty</h2></td>
                  <td className="Rate"><h2>Unit</h2></td>
                  <td className="Rate"><h2>Total</h2></td>
                </tr>
              </thead>
              <tbody>
                {dataOrders.map((item) => (
                  <tr className="service" key={uuidv4()}>
                    <td className="tableitem"><p className="itemtext">{item.name}</p></td>
                    <td className="tableitem"><p className="itemtext">{item.pivot.quantity}</p></td>
                    <td className="tableitem"><p className="itemtext">{item.sellprice}</p></td>
                    <td className="tableitem"><p className="itemtext">{item.sellprice * item.pivot.quantity}{" "}{window.APP.currency_symbol}</p></td>
                  </tr>
                ))
                }
              </tbody>
              <tfoot>
                <tr className="tabletitle">
                  <td></td>
                  <td></td>
                  <td className="Rate"><h2>Total</h2></td>
                  <td className="Payment"><h2>{data}{" "}{window.APP.currency_symbol}</h2></td>
                </tr>
              </tfoot>
            </table>
            <div className="legalcopy">
              <p> The good which are subject to tax, prices includes tax
              </p>
            </div>
            <div className="serial-number">
              <span> {Date()} </span>
            </div>
            <div className="legalcopy">
              <p className="legal "> <strong>** Thank you for visiting **</strong></p>
            </div>
          </div>
        <button style={{ position: 'absolute', bottom: 10}} onClick={handlePrint} className='btn btn-primary impression_invisible'>Print Me</button>
        </div >
      </Modal >
       
    </div >

  );
}
