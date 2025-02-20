// Seleccionar elementos del DOM
const chatArea = document.getElementById('chat-area');
const messageInput = document.getElementById('message-input');
const sendButton = document.getElementById('send-button');

// Función para agregar un mensaje al chat
function agregarMensaje(mensaje, tipo) {
  // Crear el contenedor del mensaje
  const messageDiv = document.createElement('div');
  messageDiv.classList.add('message', tipo);
  
  // Crear la burbuja del mensaje
  const bubbleDiv = document.createElement('div');
  bubbleDiv.classList.add('bubble', tipo);
  bubbleDiv.textContent = mensaje;
  
  // Añadir la burbuja al contenedor
  messageDiv.appendChild(bubbleDiv);
  
  // Agregar el mensaje al área de chat
  chatArea.appendChild(messageDiv);
  
  // Hacer scroll al final del chat para ver el mensaje agregado
  chatArea.scrollTop = chatArea.scrollHeight;
}

// Función para  una respuesta del bot
function simularRespuesta(usuarioMensaje) {
    // Realiza una petición POST al backend
    fetch('http://localhost:8080/api/chat', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify({ prompt: usuarioMensaje, max_tokens: 50 })
    })
    .then(response => response.json())
    .then(data => {
      // Asumiendo que la respuesta del backend tiene la propiedad 'respuesta'
      agregarMensaje(data.respuesta, 'bot');
    })
    .catch(error => {
      console.error('Error en la petición:', error);
      agregarMensaje('Lo siento, hubo un error.', 'bot');
    });
  }
  

// Función para manejar el envío de mensajes
function enviarMensaje() {
  const mensaje = messageInput.value.trim();
  if (mensaje !== '') {
    // Agregar el mensaje del usuario
    agregarMensaje(mensaje, 'user');
    // Limpiar el campo de entrada
    messageInput.value = '';
    // Simular respuesta del bot
    simularRespuesta(mensaje);
  }
}

// Asignar el evento al botón de enviar
sendButton.addEventListener('click', enviarMensaje);

// También enviar el mensaje cuando se presiona "Enter" en el campo de texto
messageInput.addEventListener('keypress', function(e) {
  if (e.key === 'Enter') {
    enviarMensaje();
  }
});