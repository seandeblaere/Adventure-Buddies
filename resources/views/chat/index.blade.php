<x-layout>
    <div class="flex h-screen">
        <!-- Lege div om de ID van de ingelogde gebruiker die werd meegegeven via de controller function op te slaan in de class -->
        <div id="userIdContainer" class="{{ $userId }}"></div>

        <div class="flex flex-col w-1/4 bg-gray-100 border-r border-gray-200">
            <div class="p-4 border-b border-gray-200">
                <h2 class="text-lg font-semibold text-gray-800">Conversations</h2>
            </div>
            <div class="overflow-y-auto">
                @foreach ($conversations as $conversation)
                    <a href="#" class="flex items-center justify-between p-4 border-b border-gray-200 hover:bg-gray-200 conversation-link" data-conversation-id="{{ $conversation->id }}">
                        <div>
                            <h3 class="text-gray-800">{{ $conversation->name }}</h3>
                            <p class="text-sm text-gray-600 conversation-last-message">Last Message:</p>
                        </div>
                        <span class="text-gray-500 text-sm conversation-last-message-time">-</span>
                    </a>
                @endforeach
            </div>
        </div>

        <div class="flex flex-col w-3/4 bg-white">
            <div class="p-4 border-b border-gray-200 flex items-center justify-between">
                <h2 id="conversation-name" class="text-lg font-semibold text-gray-800">Select a conversation</h2>
            </div>

            <div class="flex-1 overflow-y-auto px-4 py-2 flex flex-col-reverse" id="message-list">
            </div>

            <form id="message-form" class="border-t border-gray-200 p-4">
                @csrf
                <input type="hidden" id="conversation-id" name="conversation_id">
                <div class="flex items-center">
                    <input type="text" id="message-text" name="message_text" class="flex-1 border border-gray-200 rounded-md py-2 px-4 focus:outline-none focus:border-green-400" placeholder="Type a message...">
                    <button type="submit" class="ml-4 px-6 py-2 bg-green-500 text-white rounded-md hover:bg-green-600 focus:outline-none focus:bg-green-600">Send</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const links = document.querySelectorAll('.conversation-link');
            const messageList = document.getElementById('message-list');
            const conversationName = document.getElementById('conversation-name');
            const conversationIdInput = document.getElementById('conversation-id');
            const messageForm = document.getElementById('message-form');
            const messageTextInput = document.getElementById('message-text');

            // haal de userid op via de value van de eerste class van de lege div want kan geen laravel of breeze auth middleware gebruiken via javascript
            const userIdContainer = document.getElementById('userIdContainer');
            const userId = userIdContainer.classList[0];

            links.forEach(link => {
                link.addEventListener('click', function (e) {
                    e.preventDefault();
                    const conversationId = this.getAttribute('data-conversation-id');
                    conversationIdInput.value = conversationId;

                    // Highlight de juiste conversation
                    links.forEach(link => link.classList.remove('bg-green-100'));
                    this.classList.add('bg-green-100');

                    // Reset de scrollbar want willen nieuwste berichten eerst zien en omhoog scrollen voor eerdere berichten
                    messageList.scrollTop = 0;

                    // Update de conversation name
                    conversationName.textContent = this.querySelector('h3').textContent;

                    // Fetch de messages for de geselecteerde conversation
                    fetch(`/profile/chats/${conversationId}`)
                        .then(response => response.json())
                        .then(data => {
                            messageList.innerHTML = '';
                            data.messages.reverse().forEach(message => {

                                // gebruik nu de userid om een andere class te geven aan berichten van ingelogde user
                                const isCurrentUser = message.user.id == userId;
                                const messageClass = isCurrentUser ? 'text-right bg-green-200 ml-auto' : '';
                                const messageHTML = `
                                    <div class="message bg-gray-200 p-3 rounded-lg max-w-xs mb-4 ${messageClass}">
                                    <p class="text-gray-800">${message.message_text}</p>
                                    <span class="text-sm text-gray-600">${message.user.name} • ${message.created_at}</span>
                                    </div>
                                `;
                                messageList.insertAdjacentHTML('beforeend', messageHTML);
                            });
                        });
                });
            });

            // Fetch the latest message for each conversation
            links.forEach(link => {
                const conversationId = link.getAttribute('data-conversation-id');
                fetch(`/profile/chats/${conversationId}`)
                    .then(response => response.json())
                    .then(data => {
                        const lastMessage = data.messages[data.messages.length - 1];
                        if (lastMessage) {
                            link.querySelector('.conversation-last-message').textContent = lastMessage.message_text;
                            link.querySelector('.conversation-last-message-time').textContent = lastMessage.created_at;
                        } else {
                            link.querySelector('.conversation-last-message').textContent = 'No messages yet';
                        }
                    });
            });

            // Stuur message via de form
            messageForm.addEventListener('submit', function (e) {
                e.preventDefault();

                const conversationId = conversationIdInput.value;
                const messageText = messageTextInput.value;

                if (!conversationId || !messageText) {
                    return;
                }

                const formData = new FormData();
                formData.append('message_text', messageText);
                formData.append('_token', '{{ csrf_token() }}');

                // de post zal via de controller json data returnen van het verstuurde bericht, zo hoef je niet alles opnieuw te fetchen
                fetch(`/profile/chats/${conversationId}`, {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        const message = data.message;
                        // styling als eigen verstuurd bericht
                        const messageHTML = `
                            <div class="message text-right bg-green-200 p-3 rounded-lg max-w-xs mb-4 ml-auto">
                                <p class="text-gray-800">${message.message_text}</p>
                                <span class="text-sm text-gray-600">${message.user.name} • ${message.created_at}</span>
                            </div>
                        `;
                        messageList.insertAdjacentHTML('afterbegin', messageHTML);
                        messageTextInput.value = '';
                    }
                });
            });
        });
    </script>
</x-layout>









`


