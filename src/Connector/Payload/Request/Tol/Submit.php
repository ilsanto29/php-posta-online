<?php
namespace phpPostaOnline\Connector\Payload\Request\Tol;

/**
{
  "Submit": {
    "telegramma": {
      "DataTelegramma": "?",
      "Destinatari": {
        "TelegrammaDestinatario": {
          "Destinatario": {
            "CAP": "?",
            "Citta": "?",
            "Cognome": "?",
            "Indirizzo": "?",
            "Nome": "?",
            "RagioneSociale": "?",
            "Stato": "?",
            "Telefono": "?"
          },
          "Frazionario": "?",
          "IDTelegramma": "?",
          "LineaPilota": "?",
          "NumeroDestinatarioCorrente": "?",
          "TipoRec": "?",
          "TipoRecapitoJokid": "?"
        }
      },
      "Firma": "?",
      "GUIDMessage": "?",
      "Jokid": {
        "Destinazioni": {
          "Fisica": {
            "CAP": "?",
            "Citta": "?",
            "Indirizzo": "?"
          },
          "IndirizziElettronici": {
            "IndirizzoElettronico": {
              "Indirizzo": "?",
              "TipoIndirizzo": "?"
            }
          }
        }
      },
      "Mittente": {
        "CAP": "?",
        "Citta": "?",
        "Cognome": "?",
        "Indirizzo": "?",
        "InvioAlMittente": "?",
        "Nome": "?",
        "RagioneSociale": "?",
        "Telefono": "?"
      },
      "Mod60Elettronico": {
        "IndirizziElettronici": {
          "IndirizzoElettronico": {
            "Indirizzo": "?",
            "TipoIndirizzo": "?"
          }
        }
      },
      "Nazionale": "?",
      "Opzioni": {
        "CTA": "?",
        "Note": "?"
      },
      "PartiTesto": {
        "NumeroParteCorrente": "?",
        "Testo": "?"
      },
      "TipoRecapitoMod60": "?",
      "TipoTelegramma": "?",
      "Valorizzazione": {
        "Details": {
          "DetailBillRow": {
            "Currency": "?",
            "Description": "?",
            "GrossValue": "?",
            "NetValue": "?",
            "TaxAmount": "?",
            "GrossValuePerUnit": "?",
            "MaterialCode": "?",
            "MaterialCodeDescription": "?",
            "NetValuePerUnit": "?",
            "Quantity": "?",
            "TaxAmountPerUnit": "?",
            "TaxCode": "?",
            "TaxPercentage": "?"
          }
        },
        "ImportoTotale": "?",
        "ParoleDigitate": "?",
        "ParoleFisiche": "?",
        "ParoleSviluppate": "?",
        "ParoleTassabili": "?",
        "ParoleTassateNelRigoPreambolo": "?",
        "TariffazioneManuale": "?",
        "Total": {
          "Currency": "?",
          "Description": "?",
          "GrossValue": "?",
          "NetValue": "?",
          "TaxAmount": "?",
          "GrossValuePerUnit": "?",
          "MaterialCode": "?",
          "MaterialCodeDescription": "?",
          "NetValuePerUnit": "?",
          "Quantity": "?",
          "TaxAmountPerUnit": "?",
          "TaxCode": "?",
          "TaxPercentage": "?"
        }
      }
    },
    "Customer": "?",
    "idRequest": "?"
  }
}
 */
class Submit
{
    public $telegramma = new Telegramma();
    public $Customer    = null;
    public $idRequest   = null;
    
    
    /**
     * @return \phpPostaOnline\Connector\Payload\Request\Tol\Telegramma
     */
    public function getTelegramma()
    {
        return $this->telegramma;
    }

    /**
     * @return mixed
     */
    public function getCustomer()
    {
        return $this->Customer;
    }

    /**
     * @return mixed
     */
    public function getIdRequest()
    {
        return $this->idRequest;
    }

    /**
     * @param \phpPostaOnline\Connector\Payload\Request\Tol\Telegramma $telegramma
     */
    public function setTelegramma($telegramma)
    {
        $this->telegramma = $telegramma;
    }

    /**
     * @param mixed $Customer
     */
    public function setCustomer($Customer)
    {
        $this->Customer = $Customer;
    }

    /**
     * @param mixed $idRequest
     */
    public function setIdRequest($idRequest)
    {
        $this->idRequest = $idRequest;
    }

    
    
}