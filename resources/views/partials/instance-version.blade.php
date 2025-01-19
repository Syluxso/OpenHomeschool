<div class="col-sm-12 col-md-3">
    <div class="widget widget--dark">
        <div id="dev--instance--{{ $data->id }}" class="text-center">
            <br />
            <br />
            <h4 class="text-uppercase">{{ $data->label }}</h4>
            <br />
        </div>
        <div class="list-group">
            <div class="list-group-item text-left">
                <div class="float-end">
                    <div id="dev--host--{{ $data->id }}">
                        <h6>Connection refused at<br />{{ $data->url }}</h6>
                    </div>
                </div>
                <label>Host</label>
            </div>
            <div class="list-group-item text-left">
                <div class="float-end">
                    <div id="dev--version--{{ $data->id }}" class="hidden">
                        <h3 style="padding:0;margin:0;"><span></span></h3>
                    </div>
                </div>
                <label>Version</label>
            </div>
            <div class="list-group-item text-left">
                <div class="float-end">
                    <h6 id="dev--ip_address--{{ $data->id }}" class="hidden">
                        <span>null</span>
                    </h6>
                </div>
                <label>IP Address</label>
            </div>
            <div class="list-group-item text-left">
                <div class="float-end">
                    <h6 id="dev--uuid--{{ $data->id }}" class="hidden">
                        <span style="font-size:10px;">null</span>
                    </h6>
                </div>
                <label>UUID</label>
            </div>
        </div>
    </div>
</div>
<script>
    const url_{{ $data->id }} = '{{ $data->url }}?key={{ $data->uuid }}';
    getData{{ $data->id }}();
    setInterval(getData{{ $data->id }}, 10000);

    function getData{{ $data->id }}() {
        fetch(url_{{ $data->id }})
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                console.log(data);
                setNodeValue('dev--instance--{{ $data->id }}', data.instance, 'h3')
                setNodeValue('dev--version--{{ $data->id }}', data.release, 'span', true)
                setNodeValue('dev--host--{{ $data->id }}', data.host, 'h6')
                setNodeValue('dev--ip_address--{{ $data->id }}', data.ip_address, 'span', true)
                setNodeValue('dev--uuid--{{ $data->id }}', data.uuid, 'span', true)
            })
            .catch(error => {
                console.log(error);
            });
    }
    function setNodeValue(nodeId, value, childNode, toggle) {
        const divElement = document.getElementById(nodeId);
        if(toggle === true) {
            divElement.classList.remove('hidden');
        }
        if (divElement) {
            const childElement = divElement.querySelector(childNode);
            if (childElement) {
                if(nodeId === 'dev--host--{{ $data->id }}') {
                    const anchor = document.createElement('a');
                    anchor.href = 'https://' + value;
                    anchor.target = '_blank';
                    anchor.textContent = value;
                    childElement.textContent = '';
                    childElement.appendChild(anchor);
                } else {
                    childElement.textContent = value;
                }
            }
        }
    }
</script>
