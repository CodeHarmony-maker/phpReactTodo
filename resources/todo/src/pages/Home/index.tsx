import { useState, useEffect } from 'react';
import { Button, Container, Row } from "react-bootstrap";
import axios from "axios";
import Loader from '../../common/Loader';
import Modal from '../../common/Modal';

const Index = () => {

    const [loader, setLoader] = useState(false);
    const [show, setShow] = useState(false);
    const [data, setData] = useState(null);
    const [selected, setSelected] = useState(null);

    const handleClose = () => setShow(false);
    const handleShow = () => setShow(true);

    const handleGetTodo = () => {
      setLoader(true)
      axios.get('/api/todo/index').then((response) => {
          if(response.status === 200)
          {
              setData(response.data.data)
              setLoader(false)
          }
      });
    }
    
    useEffect(() => {
        handleGetTodo()
      }, []);


     const handleAddTodo = (input) => {
        setLoader(true)
        axios.post('/api/todo', {title: input}).then((response) => {
            if(response.status === 200)
            {
                setData(response.data.data)
                setLoader(false)
            }
        });
        handleGetTodo()
        handleClose()
      }

     const handleTodoDelete = () => {
        setLoader(true)
        axios.delete(`/api/todo/delete/${selected}`).then((response) => {
        });
        handleGetTodo()
      }

    return (
        <div className='home'>
            {loader ?
                <Loader />
                :
                <Container>
                    <Row>
                        <Button className="top_btn" onClick={() => handleShow()}>Add</Button>
                        <Button className="top_btn" onClick={() => handleTodoDelete()}>Delete</Button>
                        <Button className="top_btn">Complete</Button>
                    </Row>
                    <div className="data_list">
                        {data && data.map((value, i) => 
                            (
                                <div key={i}>
                                    <input 
                                        className="input_check" 
                                        type="checkbox"
                                        id={value.title} 
                                        name={value.title} 
                                        value={value.title}
                                        onChange={() => {
                                            setSelected(value.id)
                                        }}
                                    />
                                    <label 
                                        htmlFor={value.title} 
                                        style={{textDecoration: 
                                        value.status ? 'line-through' : ''}}>
                                        {value.title}
                                    </label>
                                </div>
                            ))}
                    </div>
                </Container>
            }
            {/* Add todo Modal */}
           <Modal show={show} handleClose={handleClose} handleAddTodo={handleAddTodo} />
        </div>
    )
}
export default Index;