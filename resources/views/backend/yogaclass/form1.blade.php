<div class="form-group">
                                <label class="control-label">Time</label>
                                <div>
                                    <input type="text" class="form-control input-lg" name="time" id="time" required autocomplete ="time">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label">Sunday</label>
                                <div>
                                    <!-- <select class="form-control input-lg" name="sunday" id="sunday">
                                        <option value="disabled selected">-Select Yoga-</option>
                                        <option value="Traditional Yoga">Traditional Yoga</option>
                                        <option value="Vinyasa Yoga">Vinyasa Yoga</option>
                                        <option value="Hatha Vinyasa">Hatha Vinyasa</option>
                                        <option value="Vinyasa Power">Vinyasa Power</option>
                                        <option value="Astrology + Yoga">Astrology + Yoga</option>
                                        <option value="Chakra mudra">Chakra mudra</option>
                                        <option value="Ashtanga Yoga">Ashtanga Yoga</option>
                                        <option value="Pranayama Meditation">Pranayama Meditation</option>

                                    </select> -->
                                    <select class="form-control input-lg" name="sunday" id="sunday" >
                                        <option value="disabled selected" >-Select Yoga-</option>
                                        @foreach($yogatypes as $item)
                                        <option value="{{$item->name}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label">Monday</label>
                                <div>
                                    <!-- <select class="form-control input-lg" name="monday" id="monday">
                                        <option value="disabled selected">-Select Yoga-</option>
                                        <option value="Traditional Yoga">Traditional Yoga</option>
                                        <option value="Vinyasa Yoga">Vinyasa Yoga</option>
                                        <option value="Hatha Vinyasa">Hatha Vinyasa</option>
                                        <option value="Vinyasa Power">Vinyasa Power</option>
                                        <option value="Astrology + Yoga">Astrology + Yoga</option>
                                        <option value="Chakra mudra">Chakra mudra</option>
                                        <option value="Ashtanga Yoga">Ashtanga Yoga</option>
                                        <option value="Pranayama Meditation">Pranayama Meditation</option>

                                    </select> -->

                                    <select class="form-control input-lg" name="monday" id="monday">
                                        <option value="disabled selected">-Select Yoga-</option>
                                        @foreach($yogatypes as $item)
                                        <option value="{{$item->name}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label">Tuesday</label>
                                <div>
                                    <!-- <select class="form-control input-lg" name="tuesday" id="tuesday">
                                        <option value="disabled selected">-Select Yoga-</option>
                                        <option value="Traditional Yoga">Traditional Yoga</option>
                                        <option value="Vinyasa Yoga">Vinyasa Yoga</option>
                                        <option value="Hatha Vinyasa">Hatha Vinyasa</option>
                                        <option value="Vinyasa Power">Vinyasa Power</option>
                                        <option value="Astrology + Yoga">Astrology + Yoga</option>
                                        <option value="Chakra mudra">Chakra mudra</option>
                                        <option value="Ashtanga Yoga">Ashtanga Yoga</option>
                                        <option value="Pranayama Meditation">Pranayama Meditation</option>

                                    </select> -->
                                    <select class="form-control input-lg" name="tuesday" id="tuesday">
                                        <option value="disabled selected">-Select Yoga-</option>
                                        @foreach($yogatypes as $item)
                                        <option value="{{$item->name}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label">Wednesday</label>
                                <div>
                                    <!-- <select class="form-control input-lg" name="wednesday" id="wednesday">
                                        <option value="disabled selected">-Select Yoga-</option>
                                        <option value="Traditional Yoga">Traditional Yoga</option>
                                        <option value="Vinyasa Yoga">Vinyasa Yoga</option>
                                        <option value="Hatha Vinyasa">Hatha Vinyasa</option>
                                        <option value="Vinyasa Power">Vinyasa Power</option>
                                        <option value="Astrology + Yoga">Astrology + Yoga</option>
                                        <option value="Chakra mudra">Chakra mudra</option>
                                        <option value="Ashtanga Yoga">Ashtanga Yoga</option>
                                        <option value="Pranayama Meditation">Pranayama Meditation</option>

                                    </select> -->
                                    <select class="form-control input-lg" name="wednesday" id="wednesday">
                                        <option value="disabled selected">-Select Yoga-</option>
                                        @foreach($yogatypes as $item)
                                        <option value="{{$item->name}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Thrusday</label>
                                <div>
                                    <!-- <select class="form-control input-lg" name="thursday" id="thursday">
                                        <option value="disabled selected">-Select Yoga-</option>
                                        <option value="Traditional Yoga">Traditional Yoga</option>
                                        <option value="Vinyasa Yoga">Vinyasa Yoga</option>
                                        <option value="Hatha Vinyasa">Hatha Vinyasa</option>
                                        <option value="Vinyasa Power">Vinyasa Power</option>
                                        <option value="Astrology + Yoga">Astrology + Yoga</option>
                                        <option value="Chakra mudra">Chakra mudra</option>
                                        <option value="Ashtanga Yoga">Ashtanga Yoga</option>
                                        <option value="Pranayama Meditation">Pranayama Meditation</option>

                                    </select> -->
                                    <select class="form-control input-lg" name="thursday" id="thursady">
                                        <option value="disabled selected">-Select Yoga-</option>
                                        @foreach($yogatypes as $item)
                                        <option value="{{$item->name}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> <div class="form-group">
                                <label class="control-label">Friday</label>
                                <div>
                                    <!-- <select class="form-control input-lg" name="friday" id="friday">
                                        <option value="disabled selected">-Select Yoga-</option>
                                        <option value="Traditional Yoga">Traditional  Yoga</option>
                                        <option value="Vinyasa Yoga">Vinyasa Yoga</option>
                                        <option value="Hatha Vinyasa">Hatha Vinyasa</option>
                                        <option value="Vinyasa Power">Vinyasa Power</option>
                                        <option value="Astrology + Yoga">Astrology + Yoga</option>
                                        <option value="Chakra mudra">Chakra mudra</option>
                                        <option value="Ashtanga Yoga">Ashtanga Yoga</option>
                                        <option value="Pranayama Meditation">Pranayama Meditation</option>

                                    </select> -->
                                    <select class="form-control input-lg" name="friday" id="friday">
                                        <option value="disabled selected">-Select Yoga-</option>
                                        @foreach($yogatypes as $item)
                                        <option value="{{$item->name}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> <div class="form-group">
                                <label class="control-label">Saturday</label>
                                <div>
                                    <!-- <select class="form-control input-lg" name="saturday" id="saturday">
                                        <option value="disabled selected">-Select Yoga-</option>
                                        <option value="Traditional Yoga">Traditional  Yoga</option>
                                        <option value="Vinyasa Yoga">Vinyasa Yoga</option>
                                        <option value="Hatha Vinyasa">Hatha Vinyasa</option>
                                        <option value="Vinyasa Power">Vinyasa Power</option>
                                        <option value="Astrology + Yoga">Astrology + Yoga</option>
                                        <option value="Chakra mudra">Chakra mudra</option>
                                        <option value="Ashtanga Yoga">Ashtanga Yoga</option>
                                        <option value="Pranayama Meditation">Pranayama Meditation</option>

                                    </select> -->
                                    <select class="form-control input-lg" name="saturday" id="saturday">
                                        <option value="disabled selected">-Select Yoga-</option>
                                        @foreach($yogatypes as $item)
                                        <option value="{{$item->name}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
