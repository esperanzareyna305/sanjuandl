<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Reservas</title>
    <script src="https://js.stripe.com/v3/"></script>
    <style>

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        button {
            background-color: #4682B4;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            background: #fff;
            border: 1px solid #ccc;
            z-index: 1;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            width: 300px;
            text-align: center;
        }

        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 0;
        }

        h2 {
            color: #333;
        }

        label {
            display: block;
            margin-top: 10px;
            color: #555;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button.popup-button {
            background-color: #4682B4;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        button.popup-button:hover {
            background-color: #4682B4;
        }

        span.close-button {
            cursor: pointer;
            float: right;
            font-size: 20px;
            color: #aaa;
        }

        span.close-button:hover {
            color: #333;
        }

        .payment-popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            background: #fff;
            border: 1px solid #ccc;
            z-index: 1;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            width: 300px;
            text-align: center;
        }

        .payment-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 0;
        }

        button.pay-button {
            background-color: ##4682B4;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        button.pay-button:hover {
            background-color: #0056b3;
        }
        
        </style>
</head>
<body>

<button onclick="openPopup()">Aparta tu lugar</button>

<div id="popup" class="popup">
    <span class="close-button" onclick="closePopup()">&times;</span>
    <h2>Reserva</h2>
    <label for="start">Desde:</label>
    <input type="date" id="start" name="start" required>
    <br>
    <label for="end">Hasta:</label>
    <input type="date" id="end" name="end" required>
    <br>
    
    <button class="popup-button" onclick="openPaymentPopup()">Continuar al Pago</button>

</div>

<div id="overlay" class="overlay" onclick="closePopup()"></div>

<div id="payment-popup" class="payment-popup">
    <span class="close-button" onclick="closePaymentPopup()">&times;</span>
    <h2>Pago con Tarjeta</h2>
    <div id="payment-form"></div>
    <button class="pay-button" onclick="processPayment()">Procesar Pago</button>
</div>

<div id="payment-overlay" class="payment-overlay" onclick="closePaymentPopup()"></div>

<script>
    var stripe = Stripe('tu_clave_publica_de_stripe');
    var elements = stripe.elements();

    var style = {
        base: {
            fontSize: '16px',
            color: '#32325d',
        }
    };

    var card = elements.create('card', { style: style });
    card.mount('#payment-form');

    function openPaymentPopup() {
        document.getElementById("payment-popup").style.display = "block";
        document.getElementById("payment-overlay").style.display = "block";
    }

    function closePaymentPopup() {
        document.getElementById("payment-popup").style.display = "none";
        document.getElementById("payment-overlay").style.display = "none";
    }

    function processPayment() {
        // Aquí puedes enviar la información del pago al servidor y manejar la transacción.
        // Puedes utilizar AJAX para esto.

        // Después de manejar el pago, cierra la ventana emergente de pago, Perooooo no se va cerrar la otra ventana
        closePaymentPopup();
    }

    function openPopup() {
        document.getElementById("popup").style.display = "block";
        document.getElementById("overlay").style.display = "block";
    }

    function closePopup() {
        document.getElementById("popup").style.display = "none";
        document.getElementById("overlay").style.display = "none";
    }
</script>

</body>
</html>