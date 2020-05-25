import React from 'react';
import ReactDOM from 'react-dom';
import PSV from '../psv';

class Psv extends React.Component{
    constructor() {
        super();
        this.state = {
            psv: []
        }
        this.handleChange = this.handleChange.bind(this)
        this.submitChange = this.submitChange.bind(this)
    }
    handleChange(event){
        const {name, value} = event.target;
        this.setState({[name]:value});
    }
    submitChange(event){
        event.preventDefault();

    }
    componentDidMount () {
        axios.get('/psv-data').then(response => {
            this.setState({
                psv: response.data
            })
        })
    }

    render() {
        const { psv } = this.state
        return(
            <div className={""}>
                <div className="row">
                    <div className="col-md-6 col-12">
                        <div className="card">
                            <div className="card-body">
                                <p className="card-title"><i className="fa fa-bars"></i> Patient <small>PSV</small></p>
                                <div className="row">
                                    <div className="col-md-12" style="height:100px;width:100%;">
                                        <canvas id="line-chart"></canvas>
                                    </div>
                                    <div className="col-md-12" style="height:100px;width:100%;">
                                        <canvas id="line-chart1"></canvas>
                                    </div>
                                    <div className="col-md-12" style="height:100px;width:100%;">
                                        <canvas id="line-chart2"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div className="col-md-6 col-12" id="psvFormOutput">
                        <div className="card">
                            <div className="card-body">
                                <p className="card-title text-center">ABG Chart</p>
                                <div className="row">
                                    <div className="col-md-6 col-sm-12">
                                        <p className="card-title">Ventilometry</p>
                                        <table className="table table-borderless">
                                            <tbody>
                                            <tr>
                                                <td>VTi(ml)</td>
                                                <td id="vtiml" className="text-right"><span
                                                    className="badge badge-success">{psv.vtiml}</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>VTe(ml)</td>
                                                <td id="vteml" className="text-right"><span
                                                    className="badge badge-success">{psv.vtiml}</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>VTi(ml/Kg)</td>
                                                <td id="vtkg" className="text-right"><span
                                                    className="badge badge-success">{psv.vtkg}</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>VTe(ml)</td>
                                                <td id="vtkg" className="text-right"><span
                                                    className="badge badge-success">{psv.vtekg}</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>RR(bpm)</td>
                                                <td id="rrBpm" className="text-right"><span
                                                    className="badge badge-success">{psv.rrBpm}</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>VE(l/min)</td>
                                                <td id="vteml" className="text-right"><span
                                                    className="badge badge-success">{psv.vePerMint}</span>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div className="col-md-6">
                                        <p className="card-title">Synchrony</p>
                                        <table className="table table-borderless">
                                            <tbody>
                                            <tr>
                                                <td>Insp.Time(s)</td>
                                                <td id="inspTime" className="fs15 fw700 text-right"><span
                                                    className="badge badge-success">{psv.inspTime}</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Exp.Time</td>
                                                <td id="exTime" className="fs15 fw700 text-right"><span
                                                    className="badge badge-success">{psv.expTime}</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Total Time(s)</td>
                                                <td id="totalTime" className="fs15 fw700 text-right"><span
                                                    className="badge badge-success">{psv.totalTime}</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>I:E</td>
                                                <td id="ieratio" className="fs15 fw700 text-right"><span
                                                    className="badge badge-success">{psv.ieratio}</span>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <script src={PSV}></script>
            </div>
        )
    }
}
export default Psv;

if (document.getElementById('Psv')) {
    ReactDOM.render(<Psv />, document.getElementById('Psv'));
}
