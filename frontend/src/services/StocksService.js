import axios from "axios";
const STOCKS_API = process.env.REACT_APP_BASE_API_URL + "/stocks";

export const StocksService = {

    getStocksData: function (data) {
      return axios.get(STOCKS_API, {data})
    }
}