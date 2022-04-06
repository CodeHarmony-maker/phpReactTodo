import {useState} from 'react'
import { Modal, Button } from "react-bootstrap";

const Index = (props) => {
    const {show, handleClose, handleAddTodo} = props;
    const [input, setInput] = useState("")

    return (
      <Modal
      show={show}
      onHide={handleClose}
      backdrop="static"
      keyboard={false}
    >
      <Modal.Header closeButton>
        <Modal.Title>Add Todo</Modal.Title>
      </Modal.Header>
      <Modal.Body>
        <div className="form-group row">
          <label htmlFor="inputTitle" className="col-sm-2 col-form-label">Title:</label>
          <div className="col-sm-10">
            <input type="text" className="form-control" id="inputTitle" placeholder="" 
              value={input} 
              onChange={(e) => setInput(e.target.value)}
            />
          </div>
        </div>
      </Modal.Body>
      <Modal.Footer>
        <Button variant="primary" onClick={() => {
          handleAddTodo(input);
          setInput('')
          }}>Add</Button>
      </Modal.Footer>
    </Modal>
    )
}
export default Index;