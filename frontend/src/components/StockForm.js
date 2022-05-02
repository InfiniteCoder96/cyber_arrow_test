import React, { useState } from "react";
import { Button, Card, Form } from "react-bootstrap";
import { StocksService } from "../services/StocksService";

function StockForm(props) {
  const [date, setStockDate] = useState({}, []);
  const [stockData, setStockData] = useState(
    {
      open: "",
      high: "",
      low: "",
      close: "",
    },
    []
  );

  const handleFormSubmit = (e) => {
    e.preventDefault();
    const stockReqData = {
      date: date,
    };

    StocksService.getStocksData(stockReqData)
      .then(
        (res) => {
          console.log(res.data.data);
          let stock = res.data.data;
          setStockData({
            open: stock.open_value,
            high: stock.high_value,
            low: stock.low_value,
            close: stock.close_value,
          });
        },
        (error) => {
          console.log(error);
        }
      )
      .catch((error) => {
        console.log(error);
      });
  };

  const handleStockDateChange = (e) => {
    setStockDate(e.target.value);
  };

  return (
    <div className={"col-md-8"} >
      <Card>
        <Card.Body>
          <Card.Title>Stock Form</Card.Title>
          <Form>
            <Form.Label>Date</Form.Label>
            <Form.Control
              type="date"
              value={date}
              onChange={(e) => handleStockDateChange(e)}
            />
          </Form>
        </Card.Body>
        <Card.Footer>
          <Button onClick={(e) => handleFormSubmit(e)}>Submit</Button>
        </Card.Footer>
      </Card>
      {stockData.open ? (
        <Card style={{ marginTop: "10px" }}>
          <Card.Body>
            <Card.Title>Stock Data</Card.Title>
            <h5>Open: {stockData.open}</h5>
            <h5>High: {stockData.high}</h5>
            <h5>Low: {stockData.low}</h5>
            <h5>Close: {stockData.close}</h5>
          </Card.Body>
        </Card>
      ) : (
        ""
      )}
    </div>
  );
}

export default StockForm;
