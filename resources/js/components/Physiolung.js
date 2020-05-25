import React from 'react';
import ReactDOM from 'react-dom';
import heart from '../../../public/images/heart.gif';

class Physiolung extends React.Component{
    constructor() {
        super();
        this.state ={
            age	: 30,
            bmi	: 30,
            cst	: 80,
            duration	: 1,
            height	: 130,
            pmus	: 7,
            rrBpm	: 14,
            rva	: 10,
            shuntEff	: 1,
            vdvt	: 0.3,
            weight	: 40,
            rrbpm: 14,
            insp: 1,
            expt: 3.29,
            ieRatio: 3.29,
            vti: 268,
            veperminut: 3.75,
            p01: 2.205,
            ptp: 62.025,
            work: 0.082,
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
        this.setState({rrbpm : this.state.rrBpm});
        this.setState({insp: this.state.duration});

        const expiration = ((60 / this.state.rrBpm) - this.state.duration).toFixed(2);
        this.setState({expt: expiration});

        const ieR = (this.state.expt / this.state.insp).toFixed(2);
        this.setState({ieRatio: ieR});

        const vt = ((72 * this.state.pmus + (20 - this.state.rva) * 10 + (this.state.cst - 40) * 5) / 3).toFixed(2);
        this.setState({vti: vt});

        const vpm = ((vt * this.state.rrBpm) / 1000).toFixed(3);
        this.setState({veperminut: vpm});

        const po = ((this.state.pmus / this.state.duration) * 0.315).toFixed(2);
        this.setState({p01: po});

        const pt = ((this.state.pmus * this.state.rrBpm) * this.state.duration / 1.58).toFixed(2);
        this.setState({ptp: pt});

        const wrk = (((this.state.pmus * 0.0314 + this.state.vdvt * 0.0035) + (20 - this.state.rva) * 0.02 + (this.state.cst - 40) * 0.01) / 10).toFixed(3);
        this.setState({work: wrk});
    }

    render() {
        return(
            <div className={""}>
                <div className="row">
                    <div className="col-md-9 col-lg-8 stretch-card mb-3">
                        <div className="card">
                            <div className="card-header">
                                <p className="card-title">Patient</p>
                            </div>
                            <div className="card-body">
                                <form className="row mb-3" id="physioLung" onSubmit={this.submitChange}>
                                    <div className="col-md-4">
                                        <div className="row">
                                            <div className="col-md-12 input-group input-group-sm mb-2">
                                                <div className="input-group-prepend">
                                                    <span className="input-group-text text-black-50" id="age">Age</span>
                                                </div>
                                                <input type="number" id="age" name="age" className="form-control" min="1" max="99" step="1" value={this.state.age} onChange={this.handleChange} aria-label="age" aria-describedby="age" />
                                            </div>
                                            <div className="col-md-12 input-group input-group-sm mb-2">
                                                <div className="input-group-prepend">
                                                    <span className="input-group-text text-black-50" id="height">Height</span>
                                                </div>
                                                <input type="number" id="height" name="height" className="form-control" min="101" max="200" step="0.1" value={this.state.height} onChange={this.handleChange} aria-label="height" aria-describedby="height" />
                                            </div>
                                            <div className="col-md-12 input-group input-group-sm mb-2">
                                                <div className="input-group-prepend">
                                                    <span className="input-group-text text-black-50" id="weight">Weight</span>
                                                </div>
                                                <input type="number" id="weight" name="weight" className="form-control" min="20" max="150" step="1" value={this.state.weight} onChange={this.handleChange} aria-label="weight" aria-describedby="weight" />
                                            </div>
                                            <div className="col-md-12 input-group input-group-sm mb-2">
                                                <div className="input-group-prepend">
                                                    <span className="input-group-text text-black-50" id="bmi">BMI</span>
                                                </div>
                                                <input type="number" id="bmi" name="bmi" className="form-control" min="1" max="99" step="1" value={this.state.bmi} onChange={this.handleChange} aria-label="bmi" aria-describedby="bmi" />
                                            </div>
                                        </div>
                                    </div>
                                    <div className="col-md-4">
                                        <div className="row">
                                            <div className="col-md-12 input-group input-group-sm mb-2">
                                                <div className="input-group-prepend">
                                                    <span className="input-group-text text-black-50" id="rva">RVA</span>
                                                </div>
                                                <input type="number" id="rva" name="rva" className="form-control" min="1" max="99" step="1" value={this.state.rva} onChange={this.handleChange} aria-label="rva" aria-describedby="rva" />
                                            </div>
                                            <div className="col-md-12 input-group input-group-sm mb-2">
                                                <div className="input-group-prepend">
                                                    <span className="input-group-text text-black-50" id="cst">CST</span>
                                                </div>
                                                <input type="number" id="cst" name="cst" className="form-control" min="80" max="200" step="0.1" value={this.state.cst} onChange={this.handleChange} aria-label="cst" aria-describedby="cst" />
                                            </div>
                                            <div className="col-md-12 input-group input-group-sm mb-2">
                                                <div className="input-group-prepend">
                                                    <span className="input-group-text text-black-50" id="vdvt">VD/VT</span>
                                                </div>
                                                <input type="number" id="vdvt" name="vdvt" className="form-control" min="0" max="150" step="0.1" value={this.state.vdvt} onChange={this.handleChange} aria-label="vdvt" aria-describedby="vdvt" />
                                            </div>
                                            <div className="col-md-12 input-group input-group-sm mb-2">
                                                <div className="input-group-prepend">
                                                    <span className="input-group-text text-black-50" id="shuntEff">Shunt Effect</span>
                                                </div>
                                                <input type="number" id="shuntEff" name="shuntEff" className="form-control" min="1" max="99" step="1" value={this.state.shuntEff} onChange={this.handleChange} aria-label="shuntEff" aria-describedby="shuntEff" />
                                            </div>
                                        </div>
                                    </div>
                                    <div className="col-md-4">
                                        <div className="row">
                                            <div className="col-md-12 input-group input-group-sm mb-2">
                                                <div className="input-group-prepend">
                                                    <span className="input-group-text text-black-50" id="pmus">PMUS</span>
                                                </div>
                                                <input type="number" id="pmus" name="pmus" className="form-control" min="1" max="99" step="1" value={this.state.pmus} onChange={this.handleChange} aria-label="pmus" aria-describedby="pmus" />
                                            </div>
                                            <div className="col-md-12 input-group input-group-sm mb-2">
                                                <div className="input-group-prepend">
                                                    <span className="input-group-text text-black-50" id="rrBpm">RR(bpm)</span>
                                                </div>
                                                <input type="number" id="rrBpm" name="rrBpm" className="form-control" min="1" max="200" step="1" value={this.state.rrBpm} onChange={this.handleChange} aria-label="rrBpm" aria-describedby="rrBpm" />
                                            </div>
                                            <div className="col-md-12 input-group input-group-sm mb-2">
                                                <div className="input-group-prepend">
                                                    <span className="input-group-text text-black-50" id="duration">Duration</span>
                                                </div>
                                                <input type="number" id="duration" name="duration" className="form-control" min="0" max="150" step="0.1" value={this.state.duration} onChange={this.handleChange} aria-label="duration" aria-describedby="duration" />
                                            </div>
                                            <div className="col-md-12 input-group input-group-sm mb-2"> </div>
                                        </div>
                                    </div>
                                    <div className="col-md-12 text-center">
                                        <button type="submit" className="btn btn-sm btn-success" onSubmit={this.submitChange}>Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div className="col-md-9 col-lg-8 stretch-card mb-3">
                        <div className="card">
                            <div className="card-header">
                                <p className="card-title">Parameter</p>
                            </div>
                            <div className="card-body">
                                <div className="row">
                                    <div className="col-md-3 col-sm-6 col-12 table-responsive">
                                        <table className="table table-borderless">
                                            <tbody>
                                            <tr>
                                                <td>RR(bpm)</td>
                                                <td id="rrbpm" className="text-right"><span className="badge badge-success">{this.state.rrbpm}</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Insp. T</td>
                                                <td id="insp" className="text-right"><span className="badge badge-success">{this.state.insp}</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Exp.T</td>
                                                <td id="expt" className="text-right"><span className="badge badge-success">{this.state.expt}</span>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div className="col-md-3 col-sm-6 col-12 table-responsive">
                                        <table className="table table-borderless">
                                            <tbody>
                                            <tr>
                                                <td>I:E</td>
                                                <td id="ieratio" className="text-right"><span className="badge badge-success">1:{this.state.ieRatio}</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>VTi (ml)</td>
                                                <td id="vti" className="text-right"><span className="badge badge-success">{this.state.vti}</span></td>
                                            </tr>
                                            <tr>
                                                <td>VE (l/min)</td>
                                                <td id="veperminut" className="text-right"><span className="badge badge-success">{this.state.veperminut}</span>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div className="col-md-3 col-sm-6 col-12 table-responsive">
                                        <table className="table table-borderless">
                                            <tbody>
                                            <tr>
                                                <td>P0.1 (cmH2O)</td>
                                                <td id="po1" className="text-right"><span className="badge badge-success">{this.state.p01}</span></td>
                                            </tr>
                                            <tr>
                                                <td>PTP (cmH2O.s.m-1)</td>
                                                <td id="ptp" className="text-right"><span className="badge badge-success">{this.state.ptp}</span></td>
                                            </tr>
                                            <tr>
                                                <td>Work (Joules/l)</td>
                                                <td id="work" className="text-right"><span className="badge badge-success">{this.state.work}</span>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div className={"col-md-3 col-sm-6 text-center"} id={"heartRate"}>
                                        <img src={heart} className={"human-heart img-fluid"} width="78px" height="auto" alt={"<i className='fa fa-heart'></i>"}  />
                                        <audio src={'audio/heartBeat.mp3'} autoPlay loop>&nbsp;</audio>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        )
    }
}
export default Physiolung;

if (document.getElementById('Physiolung')) {
    ReactDOM.render(<Physiolung />, document.getElementById('Physiolung'));
}
