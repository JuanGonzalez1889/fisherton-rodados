<script>
    (() => {
        const eventNames = [
            'livewire-upload-start',
            'livewire-upload-progress',
            'livewire-upload-finish',
            'livewire-upload-error',
            'livewire-upload-cancel',
        ];
        const lastProgress = new WeakMap();

        const sendDiagnostic = (payload) => {
            const csrf = document.querySelector('meta[name="csrf-token"]')?.content;
            if (!csrf) {
                console.error('Image upload diagnostic could not be sent: CSRF token missing.');
                return;
            }

            fetch(@json(route('admin.upload-diagnostics')), {
                method: 'POST',
                credentials: 'same-origin',
                keepalive: true,
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrf,
                    'Accept': 'application/json',
                },
                body: JSON.stringify(payload),
            }).catch((error) => {
                console.error('Image upload diagnostic could not reach the server.', error);
            });
        };

        eventNames.forEach((eventName) => {
            document.addEventListener(eventName, (event) => {
                const input = event.target;
                if (
                    !(input instanceof HTMLInputElement) ||
                    input.type !== 'file' ||
                    (!input.accept.includes('image') && !input.files?.[0]?.type.startsWith('image/'))
                ) {
                    return;
                }

                const rawEvent = eventName.replace('livewire-upload-', '');
                const progress = rawEvent === 'progress'
                    ? Number(event.detail?.progress)
                    : null;

                if (rawEvent === 'progress') {
                    const previous = lastProgress.get(input) ?? -1;
                    const milestone = Math.floor(progress / 25) * 25;
                    if (milestone === previous || (milestone === 0 && previous === -1)) {
                        lastProgress.set(input, milestone);
                        return;
                    }
                    lastProgress.set(input, milestone);
                }

                const file = input.files?.[0];
                sendDiagnostic({
                    event: rawEvent,
                    field: input.name || null,
                    size: file?.size ?? null,
                    mime: file?.type || null,
                    progress,
                    occurred_at: new Date().toISOString(),
                });

                if (rawEvent === 'finish' || rawEvent === 'error' || rawEvent === 'cancel') {
                    lastProgress.delete(input);
                }
            }, true);
        });
    })();
</script>
