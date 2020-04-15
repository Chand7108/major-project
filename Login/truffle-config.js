// require('dotenv').config();
// var HDWalletProvider = require("truffle-hdwallet-provider");
// var mnemonic = process.env["NEMONIC"];
// var tokenKey = process.env["ENDPOINT_KEY"];

module.exports = {
  networks: {
    development: {
      host: "localhost",
      port: 8545,
      network_id: "*" // Match any network id
    },
    ropsten:  {
      network_id: 3,
      host: "localhost",
      port:  8545,
      gas:   2900000
      }
  },
  rpc: {
   host: 'localhost',
   post:8080
  },
  compilers: {
	 solc: {
		version : "0.5.16",
	}
 }			   
};